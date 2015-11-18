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
use App\InstagramAccount;
use App\CustomClasses\InstagramAPI;

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
    print_r($faruk->setUserMediaSubscription('http://koalashop.eu1.frbit.net/instagramcallback'));
    return null;
});

Route::get('register', 'AuthenticationController@showRegister');


Route::group(['prefix' => 'dashboard'],function(){
    Route::group(['prefix'=>'supplier'],function(){
        Route::get('{id}/edit','Dashboard\SupplierController@edit');
        Route::post('{id}/update','Dashboard\SupplierController@update');
    });
});


Route::group(['prefix' => 'register'], function () {

    Route::get('/', 'AuthenticationController@showRegister');

    Route::get('supplierviainstagram', 'AuthenticationController@registersupplierviainstagram');
    Route::get('supplier', 'Dashboard\SupplierController@create');
    Route::any('store/supplier', 'Dashboard\SupplierController@store');

});
Route::any('instagramcallback', 'InstagramController@callback');
