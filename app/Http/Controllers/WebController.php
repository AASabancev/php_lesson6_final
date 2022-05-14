<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Repositories\GoodRepository;
use Illuminate\Http\Request;

class WebController extends Controller
{
    protected $goodRepository;

    public function __construct()
    {
        $this->goodRepository = new GoodRepository();
    }
    public function indexPage(Request $request)
    {
        $search = $request->get('search');

        $data = PageHelper::defaultPageData();

        $categoryGoods = $this->goodRepository->getGroupsByFilter(['search' => $search]);
        $data['goods'] = $categoryGoods['goods'];
        $data['goods_count'] = $categoryGoods['goods_count'];
        $data['pagination'] = $categoryGoods['pagination'];

        $data['search'] = $search;

        $data['page_title'] = "Главная";
        return view('index', compact('data'));
    }


    public function aboutPage(Request $request)
    {
        $data = PageHelper::defaultPageData();
        $data['random_middle_goods'] = $this->goodRepository->getRandomItems();
        $data['page_title'] = "О компании";
        return view('about', compact('data'));
    }


}
