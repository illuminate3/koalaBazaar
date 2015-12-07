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
use Illuminate\Support\Facades\Storage;
Route::get('/','Frontend\HomeController@index');
Route::get('category/{slug?}','Frontend\HomeController@category');
Route::get('shop/{id}','Frontend\HomeController@showShopProfile');

Route::get('/main',function() {
    return view('user.main');

});
Route::get('/product',function() {
    return view('user.product');

});
Route::get('/shop',function() {
    return view('user.shop');

});

Route::get('storage/{path}','FileEntryController@show')->where('path', '(.*)');;
Route::get('testmedia',function(){
    $file=new \App\FileEntry();
    $file->storeFromUrl('http://www.istanbul.ferraridealers.com/siteasset/ferraridealer/4f74a1a219b2b/961/420/selected/-216/0/0/4f74a1a219b2b.jpg','1','test');
});

Route::get('/supplierRegister', function () {
    return view('dashboard.supplierRegister');
});

Route::get('/customerRegister', function () {
    return view('dashboard.customerRegister');
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

Route::get('getprice',function(){
    $product=Product::find(1)->first();
    $product->categories()->detach();
});

Route::get('register', 'AuthenticationController@showRegister');
Route::post('login', 'AuthenticationController@doLogin');
Route::get('logout', 'AuthenticationController@doLogout');
Route::get('loginviainstagram','AuthenticationController@loginviainstagram');

Route::group(['prefix' => 'dashboard','middleware' => 'auth'],function(){
    Route::group(['prefix'=>'supplier'],function(){
        Route::get('/','Dashboard\SupplierController@show');
        Route::get('edit','Dashboard\SupplierController@edit');
        Route::post('update','Dashboard\SupplierController@update');
        Route::post('updatePassword','Dashboard\SupplierController@updatePassword');
        Route::post('updateImages','Dashboard\SupplierController@updateImages');

    });

    Route::group(['prefix'=>'product'],function(){
        Route::get('/','Dashboard\ProductController@index');
        Route::get('/edit/{id}','Dashboard\ProductController@edit');
        Route::post('/update/{id}','Dashboard\ProductController@update');
        Route::get('/setasactive/{id}','Dashboard\ProductController@setAsActive');
        Route::get('/setasdeactive/{id}','Dashboard\ProductController@setAsDeactive');
    });


    Route::group(['prefix'=>'customer'],function(){
        Route::get('/','Dashboard\CustomerController@show');
        Route::get('edit','Dashboard\CustomerController@edit');
        Route::post('update','Dashboard\CustomerController@update');
        Route::post('updatePassword','Dashboard\CustomerController@updatePassword');

        Route::group(['prefix'=>'address'],function(){
            Route::get('/','Dashboard\AddressController@index');
            Route::get('create','Dashboard\AddressController@create');
            Route::post('store','Dashboard\AddressController@store');
            Route::get('edit/{id}','Dashboard\AddressController@edit');
            Route::any('update/{id}','Dashboard\AddressController@update');

        });

    });




});

Route::group(['prefix' => 'register'], function () {

    Route::get('/', 'AuthenticationController@showRegister');

    Route::get('supplierviainstagram', 'AuthenticationController@registersupplierviainstagram');
    Route::get('supplier', 'Dashboard\SupplierController@create');
    Route::any('store/supplier', 'Dashboard\SupplierController@store');

    Route::get('customerviainstagram', 'AuthenticationController@registercustomerviainstagram');
    Route::get('customer', 'Dashboard\CustomerController@create');
    Route::any('store/customer', 'Dashboard\CustomerController@store');

});

Route::any('instagramsubscriptioncallback','InstagramController@subscriptioncallback');
Route::any('instagramcallback', 'InstagramController@callback');
