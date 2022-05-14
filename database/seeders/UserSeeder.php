<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Auto generated seed file
     * @return void
     */
    public function run()
    {

        if (User::query()->count() != 0) {
            return;
        }

        $password = env('APP_ENV') === 'production'
            ? 'superhardpassword'
            : '123456';

        $new_users = [
            [
                'id' => 1,
                'name' => 'Артем',
                'email' => 'artem@mail.ru',
                'password' => Hash::make($password),
                'role_id' => Role::ROLE_ADMIN,
            ],
        ];

        foreach ($new_users as $user) {
            User::query()->create($user);
        }

        User::factory(5)
            ->create();

    }
}
