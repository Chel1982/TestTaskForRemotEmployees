<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert(
            [
                [
                    'name' => 'Керамика, 6 век',                
                ],
                [
                    'name' => 'Осколки посуды, 6 век',
                ],
                [
                    'name' => 'Артефакты, 6 век',
                ]
            ]
        );
    }
}
