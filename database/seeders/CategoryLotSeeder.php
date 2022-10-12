<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_lot')->insert(
            [
                [
                    'category_id' => 1,
                    'lot_id' => 1                
                ],
                [
                    'category_id' => 2,
                    'lot_id' => 1
                ],
                [
                    'category_id' => 2,
                    'lot_id' => 2
                ],
                [
                    'category_id' => 3,
                    'lot_id' => 2
                ],
                [
                    'category_id' => 1,
                    'lot_id' => 3
                ],
                [
                    'category_id' => 3,
                    'lot_id' => 3
                ]
            ]
        );
    }
}
