<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GoodFactory extends Factory
{
    public function definition()
    {
        return [
            'category_id' => Category::query()->inRandomOrder()->first()->id,
            'title' => join(' ', $this->faker->words( rand(3,6) )),
            'description' => $this->faker->text(),
            'cost' => rand(100000,999999)/100,
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
