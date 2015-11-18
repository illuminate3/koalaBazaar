<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Supplier;
use App\Product;
use App\InstagramAccount;
use App\CustomClasses\InstagramAPI;
use App\User;
Route::get('/', function () {
    return view('user.index');
});

Route::get('/supplierRegister', function () {
    return view('dashboard.supplierRegister');
});

Route::get('/customerRegister', function () {
    return view('dashboard.customerRegister');
});

Route::get('/panel', function () {
    return view('dashboard.testWelcome');
});

Route::get('/default', function () {
    return view('dashboard.default');
});



Route::get('/supplierProfileEdit', function () {
    return view('dashboard.supplierProfileEdit');
});


Route::get('getsubscriptions', function () {
    $faruk = new InstagramAPI();
    print_r($faruk->getSubscriptions());
    return null;
});

Route::get('setsubscriptions', function () {
    $faruk = new InstagramAPI();
    print_r($faruk->setUserMediaSubscription('https://koalashop.eu1.frbit.net/instagramsubscriptioncallback'));
    return null;
});

Route::get('testmedia',function(){
    $caption='Fiyat:20try';
    $key='fiyat:';
    $captionSmall=mb_strtolower($caption, 'UTF-8');
    echo $captionSmall.'</br>';
    $firstOccurence=strpos($captionSmall,$key);
    echo $firstOccurence.'</br>';
    $priceStart=$firstOccurence+strlen($key);
    $priceEnd=$priceStart;
    echo $priceStart.'</br>';
    $price="zaa";

    for($i=$priceStart;$i<strlen($caption);$i++){
        if(is_numeric(substr($caption,$i))){
            $price=$price.substr($caption,$i);
        }else{
            echo "ptr";
            $priceEnd=$i;
            $i=strlen($caption);

        }
    }

    echo $price.'</br>';


    return null;
});

Route::get('register', 'AuthenticationController@showRegister');
Route::post('login', 'AuthenticationController@doLogin');

Route::group(['prefix' => 'dashboard','middleware' => 'auth.simple'],function(){
    Route::group(['prefix'=>'supplier'],function(){
        Route::get('/','Dashboard\SupplierController@show');
        Route::get('/productList','Dashboard\ProductController@index');
        Route::get('edit','Dashboard\SupplierController@edit');
        Route::post('update','Dashboard\SupplierController@update');
    });

    Route::group(['prefix'=>'product'],function(){
        Route::get('/','Dashboard\ProductController@index');
    });

});


Route::group(['prefix' => 'register'], function () {

    Route::get('/', 'AuthenticationController@showRegister');

    Route::get('supplierviainstagram', 'AuthenticationController@registersupplierviainstagram');
    Route::get('supplier', 'Dashboard\SupplierController@create');
    Route::any('store/supplier', 'Dashboard\SupplierController@store');

});
Route::any('instagramsubscriptioncallback','InstagramController@subscriptioncallback');
Route::any('instagramcallback', 'InstagramController@callback');
