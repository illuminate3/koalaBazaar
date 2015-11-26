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
        \App\Category::create(['title'=>'Elektronik','slug'=>'elektronik','description'=>'Koala Elektronik Reyonu','keywords'=>'elektronik,teknoloji']);
        \App\Category::create(['title'=>'Giyim','slug'=>'giyim','description'=>'Koala Giyim Reyonu','keywords'=>'giyim,kiyafet']);
    }
}
