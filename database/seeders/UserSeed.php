<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'           => 'Admin',
                'email'          => 'admin@example.com',
                'password'       => bcrypt('admin'),
                'remember_token' => null,
                'total_income' => 0,
            ],
        ];

        User::insert($users);
    }
}
