<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderGoodFactory extends Factory
{
    public function definition()
    {
        $good = Good::query()->inRandomOrder()->first();
        $count = rand(1,10);
        $cost = $good->cost * $count;

        return [
            'good_id' => $good->id,
            'title' => $good->title,
            'count' => $count,
            'cost' => $cost
        ];
    }
}
