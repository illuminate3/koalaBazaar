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
        CurrencyUnit::create(['unit_name'=>'Amerikan Doları','unit_short_name'=>'usd']);
        CurrencyUnit::create(['unit_name'=>'Euro','unit_short_name'=>'eur']);
    }
}
