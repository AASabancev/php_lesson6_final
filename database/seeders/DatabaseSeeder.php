<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
        if (env('APP_ENV') === 'local') {
            $this->call([
                RoleSeeder::class,
                CategorySeeder::class,
                GoodSeeder::class,
                UserSeeder::class,
                SettingSeeder::class,
                GoodSeeder::class,
                OrderSeeder::class,
                NewsSeeder::class,
            ]);
        }



    }
}
