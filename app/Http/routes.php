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
Route::get('/', function () {
    return view('user.index');
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



Route::get('register', 'AuthenticationController@showRegister');
Route::post('login', 'AuthenticationController@doLogin');

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
        Route::get('/update/{id}','Dashboard\ProductController@update');
        Route::get('/setasactive/{id}','Dashboard\ProductController@setAsActive');
        Route::get('/setasdeactive/{id}','Dashboard\ProductController@setAsDeactive');
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
