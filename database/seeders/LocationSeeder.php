<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Iran'] ,
            ['name' => 'Russia']
        ];

        DB::table('countries')->insert($countries);


        $cities = [
            ['name' => 'Tehran', 'country_id' => 1],
            ['name' => 'Isfahan', 'country_id' => 1],
            ['name' => 'Tabriz', 'country_id' => 1],
            ['name' => 'San Petersburg', 'country_id' => 2],
            ['name' => 'Moscow', 'country_id' => 2],
        ];

        DB::table('cities')->insert($cities);
    }
}
