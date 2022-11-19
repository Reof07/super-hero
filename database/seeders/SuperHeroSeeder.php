<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperHeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('super_heroes')->insert(
            [
                [
                    'first_name' => 'Bruce',
                    'last_name' => 'Wayne',
                    'nick_name' => 'Batman',
                    'publisher_id' => 1
                ],
                [
                    'first_name' => 'Clark Joseph',
                    'last_name' => 'Kent ',
                    'nick_name' => 'Superman',
                    'publisher_id' => 1
                ],
                [
                    'first_name' => 'Arthur',
                    'last_name' => 'Curry ',
                    'nick_name' => 'Aquaman',
                    'publisher_id' => 1
                ],
                [
                    'first_name' => 'Barry',
                    'last_name' => 'Allen',
                    'nick_name' => 'Flash',
                    'publisher_id' => 1
                ],
                [
                    'first_name' => 'Diana',
                    'last_name' => 'Prince',
                    'nick_name' => 'Wonder Woman',
                    'publisher_id' => 1
                ],
                //////..........................
                [
                    'first_name' => 'Robert Bruce',
                    'last_name' => 'Banner',
                    'nick_name' => ' Hulk',
                    'publisher_id' => 2
                ],
                [
                    'first_name' => 'Anthony Edward',
                    'last_name' => 'Stark',
                    'nick_name' => 'Iron Man',
                    'publisher_id' => 2
                ],
                [
                    'first_name' => 'TChalla',
                    'last_name' => '-',
                    'nick_name' => 'Black Panther',
                    'publisher_id' => 2
                ],
                [
                    'first_name' => 'Thanos The Titan',
                    'last_name' => '-',
                    'nick_name' => 'Thanos',
                    'publisher_id' => 2
                ],
                [
                    'first_name' => 'Peter Benjamin',
                    'last_name' => 'Parker',
                    'nick_name' => 'Spider-Man',
                    'publisher_id' => 2
                ],
            ]
        );
    }
}
