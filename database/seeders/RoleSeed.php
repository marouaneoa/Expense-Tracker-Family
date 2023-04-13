<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'super-user',
            ],
            [
                'id'    => 2,
                'title' => 'sub-user',
            ],
        ];

        Role::insert($roles);
    }
}
