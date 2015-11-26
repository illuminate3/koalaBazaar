<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(['title'=>'Elektronic','slug'=>'elektronic','description'=>'Koala Elektronic Reyonu','keywords'=>'elektronik,teknoloji']);
        \App\Category::create(['title'=>'Giyim','slug'=>'giyim','description'=>'Koala Giyim Reyonu','keywords'=>'giyim,kiyafet']);
    }
}
