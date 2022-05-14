<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Good;
use App\Models\News;
use App\Models\Setting;

class PageHelper
{
    public static function defaultPageData(): array
    {
        $data = [];
        $data['cart_count'] = CartHelper::getCartCount();
        $data['categories'] = Category::query()->get();
//        $data['last_news'] = News::query()->all();
        $data['random_good'] = Good::query()->inRandomOrder()->first();
        $data['last_news'] = $data['news'] = News::query()->orderByDesc('datetime')->limit(3)->get();
        $data['settings'] = Setting::query()->pluck('value', 'key');

        return $data;
    }
}
