<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            ExpenseCategory::create([
                'name' => 'House Stuffs',
                'user_id' => 1
            ]);
            ExpenseCategory::create([
                'name' => 'Clothes',
                'user_id' => 1
            ]);
            ExpenseCategory::create([
                'name' => 'Telephone',
                'user_id' => 1
            ]);

    }
}
