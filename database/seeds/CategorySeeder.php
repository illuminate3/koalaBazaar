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
        \App\Category::create(['title'=>'Elektronik',
            'slug'=>'elektronik',
            'description'=>'Koala Elektronik Reyonu',
            'keywords'=>'elektronik,teknoloji']);
        \App\Category::create(['title'=>'Giyim',
            'slug'=>'giyim',
            'description'=>'Koala Giyim Reyonu',
            'keywords'=>'giyim,kiyafet']);
        \App\Category::create(['title'=>'Aksesuar',
            'slug'=>'aksesuar',
            'description'=>'Koala Aksesuar Reyonu',
            'keywords'=>'aksesuar']);
        \App\Category::create(['title'=>'Hobi',
            'slug'=>'hobi',
            'description'=>'Koala Hobi Reyonu',
            'keywords'=>'hobi']);
        \App\Category::create(['title'=>'Kozmetik',
            'slug'=>'kozmetik',
            'description'=>'Koala Kozmetik Reyonu',
            'keywords'=>'kozmetik']);
        \App\Category::create(['title'=>'Spor',
            'slug'=>'spor',
            'description'=>'Koala Spor Reyonu',
            'keywords'=>'spor']);
        \App\Category::create(['title'=>'Ofis',
            'slug'=>'ofis',
            'description'=>'Koala Ofis Reyonu',
            'keywords'=>'ofis']);
        \App\Category::create(['title'=>'Ev-Yaşam',
            'slug'=>'ev',
            'description'=>'Koala Ev-Yaşam Reyonu',
            'keywords'=>'ev,yaşam']);
    }
}
