<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Repositories\GoodRepository;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsRepository;
    protected $goodRepository;

    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
        $this->goodRepository = new GoodRepository();
    }

    public function news(Request $request)
    {
        $data = PageHelper::defaultPageData();

        $data['news'] = $this->newsRepository->getLastNews();
        $data['page_title'] = "Новости";

        return view('news.list', compact('data'));
    }

    public function newsPage(Request $request, int $page_id)
    {
        $data = PageHelper::defaultPageData();

        $data['news'] = $this->newsRepository->getById($page_id);
        $data['page_title'] = $data['news']->title;
        $data['random_middle_goods'] = $this->goodRepository->getRandomItems();

        return view('news.page', compact('data'));
    }
}
