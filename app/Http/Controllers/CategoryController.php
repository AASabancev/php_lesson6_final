<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Http\Requests\Category\SaveAdminCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\GoodRepository;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $goodRepository;
    protected $categoryRepository;
    protected $categoryService;

    public function __construct()
    {
        $this->goodRepository = new GoodRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->categoryService = new CategoryService();
    }


    public function category(Request $request, $category_id)
    {
        $data = PageHelper::defaultPageData();
        $data['category_id'] = $category_id;

        $categoryGoods = $this->goodRepository->getGroupsByFilter(['category_id' => $category_id]);
        $data['goods'] = $categoryGoods['goods'];
        $data['goods_count'] = $categoryGoods['goods_count'];
        $data['pagination'] = $categoryGoods['pagination'];

        $data['category'] = $this->categoryRepository->getById($category_id);
        $data['page_title'] =
            $data['category']
            ? "Игры в разделе " . $data['category']->title
            : "Создание нового раздела";

        return view('category', compact('data'));
    }


    public function adminCategory(Request $request, $category_id = null)
    {
        $data = PageHelper::defaultPageData();
        $data['manage_category'] = $this->categoryRepository->getById( (int)$category_id );

        $data['page_title'] = $data['manage_category']
            ? "Изменение категории " . $data['manage_category']->title
            : "Создание категории";

        return view('admin.editCategory', compact('data'));
    }

    public function saveAdminCategory(SaveAdminCategoryRequest $request, $category_id ){
        $data = $request->validated();

        $category = $this->categoryService->saveCategory($category_id, $data);

        return redirect()->route('categoryPage', ['category_id' => $category->id]);
    }

    public function adminDeleteCategory(Request $request, $category_id ){

        $this->categoryService->deleteCategory($category_id);

        return redirect()->route('indexPage');
    }
}
