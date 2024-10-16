<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['currency_code' => 978, 'original_name' => 'EUR', 'persian_name' => 'یورو'],
            ['currency_code' => 364, 'original_name' => 'IRR', 'persian_name' => 'ریال'],
            ['currency_code' => 784, 'original_name' => 'AED', 'persian_name' => 'درهم'],
            ['currency_code' => 826, 'original_name' => 'GBP', 'persian_name' => 'پوند'],
            ['currency_code' => 949, 'original_name' => 'TRY', 'persian_name' => 'لیر'],
        ];

        DB::table('currencies')->insert($currencies);
    }
}
