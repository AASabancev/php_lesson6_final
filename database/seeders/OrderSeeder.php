<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderGood;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        if (Order::query()->count() != 0) {
            return;
        }

        Order::factory(10)
            ->has(
                OrderGood::factory()->count( rand(1,3) ), 'order_goods'
            )
            ->create();
    }
}
