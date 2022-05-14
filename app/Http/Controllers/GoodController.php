<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Http\Requests\Good\SaveAdminGoodRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\GoodRepository;
use App\Services\CategoryService;
use App\Services\GoodService;
use Illuminate\Http\Request;


class GoodController extends Controller
{
    protected $goodRepository;
    protected $goodService;
    protected $categoryRepository;
    protected $categoryService;

    public function __construct()
    {
        $this->goodRepository = new GoodRepository();
        $this->goodService = new GoodService();
        $this->categoryRepository = new CategoryRepository();
        $this->categoryService = new CategoryService();
    }

    public function goodPage(Request $request, $good_id)
    {
        $data = PageHelper::defaultPageData();
        $data['good'] =  $this->goodRepository->getById($good_id);
        $data['page_title'] = $data['good']->title;

        $data['random_middle_goods'] = $this->goodRepository->getRandomItems(3);

        return view('good', compact('data'));
    }

    public function adminAddGood(Request $request, $category_id = null)
    {
        $data = PageHelper::defaultPageData();
        $data['category_id'] = $category_id;
        $data['category'] = $this->categoryRepository->getById( (int)$category_id );
        $data['page_title'] = "Добавление товара в категорию " . $data['category']->title;

        return view('admin.editGood', compact('data'));
    }

    public function adminEditGood(Request $request, $good_id = null)
    {
        $data = PageHelper::defaultPageData();
        $data['manage_good'] = $this->goodRepository->getById( (int)$good_id );

        $data['page_title'] = $data['manage_good']
            ? "Изменение товара " . $data['manage_good']->title
            : "Создание товара";

        return view('admin.editGood', compact('data'));
    }

    public function saveAdminGood(SaveAdminGoodRequest $request, $good_id ){
        $data = $request->validated();
        $image = $request->file('image');

        $good = $this->goodService->saveGood($good_id, $data, $image);

        return redirect()->route('goodPage', ['good_id' => $good->id]);
    }

    public function adminDeleteGood(Request $request, $good_id ){
        $category_id = $this->goodService->deleteGood($good_id);

        return redirect()->route('categoryPage', ['category_id' => $category_id]);
    }



}
