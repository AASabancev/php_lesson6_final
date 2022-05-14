<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    public function definition()
    {
        return [
            'author_id' => User::query()->inRandomOrder()->first()->id,
            'datetime' => Carbon::now()->subDays( rand(1, 30) )->subMinutes( rand(0, 43200) ),
            'title' =>  join(' ', $this->faker->words( rand(3,6) )),
            'description' => $this->faker->text(1500),
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
