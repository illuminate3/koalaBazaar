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
    $instagram=new InstagramAPI();
    $instagramAccount=InstagramAccount::where('instagram_id',2237148792)->first();
    if($instagramAccount->isSupplier()){
        $instagram->setAccessToken($instagramAccount->access_token);
        $media=$instagram->getUserMedia($instagramAccount->instagram_id,1);
        foreach($media->data as $singleMedia){
            if(isset($singleMedia->caption)){
                echo "not null";
            }else{
                echo "null";
            }
        }
    }
    return null;
});

Route::get('register', 'AuthenticationController@showRegister');
Route::post('login', 'AuthenticationController@doLogin');
Route::group(['prefix' => 'dashboard'],function(){
    Route::group(['prefix'=>'supplier'],function(){
        Route::get('edit','Dashboard\SupplierController@edit');
        Route::post('update','Dashboard\SupplierController@update');
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
