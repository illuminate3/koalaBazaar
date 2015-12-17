<?php

use Illuminate\Database\Seeder;
use App\CurrencyUnit;
class CurrencyUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrencyUnit::create(['unit_name'=>'Türk Lirası','unit_short_name'=>'try']);
    }
}
