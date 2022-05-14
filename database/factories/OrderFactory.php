<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'author_id' =>User::query()->inRandomOrder()->first()->id,
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
        ];
    }
}
