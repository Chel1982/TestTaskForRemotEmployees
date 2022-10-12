<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lots')->insert(
            [
                [
                    'name' => 'Амфора Вина',
                    'description' => 'Черномрская амфора',          
                ],
                [
                    'name' => 'Амфора Пшеницы',
                    'description' => 'Черномрская амфора',
                ],
                [
                    'name' => 'Амфора с маслом',
                    'description' => 'Черномрская амфора',
                ]
            ]
        );
    }
}
