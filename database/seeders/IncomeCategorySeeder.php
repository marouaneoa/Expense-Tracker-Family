<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\IncomeCategory;
use Illuminate\Database\Seeder;

class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            IncomeCategory::create([
                'name' => 'Salary',
                'user_id' => 1
            ]);
            IncomeCategory::create([
                'name' => 'Investments',
                'user_id' => 1
            ]);
            IncomeCategory::create([
                'name' => 'Gift',
                'user_id' => 1
            ]);
     }

}
