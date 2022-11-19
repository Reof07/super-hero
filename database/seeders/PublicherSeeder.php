<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publichers')->insert(
            [
                [
                    'name_publisher' => 'DC Comics'
                ],
                [
                    'name_publisher' => 'Marvel Comics'
                ]
            ]
        );
    }
}
