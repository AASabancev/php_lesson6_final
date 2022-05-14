<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        if (Role::query()->count() != 0) {
            return;
        }

        Role::query()
            ->insert([
                [
                    'id' => Role::ROLE_ADMIN,
                    'title' => 'Администратор',
                    'keyword' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => Role::ROLE_USER,
                    'title' => 'Пользователь',
                    'keyword' => 'user',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
    }
}
