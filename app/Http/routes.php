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

use App\Product;
use App\CustomClasses\InstagramAPI;

Route::get('/', 'Frontend\HomeController@index');
Route::get('kategori/{slug?}', 'Frontend\HomeController@category');

Route::group(['prefix' => 'urun'], function () {

    Route::group(['middleware' => ['auth', 'customer']], function () {
        Route::get('sepeti', 'Frontend\ProductController@showCart');
        Route::get('siparis', 'Frontend\ProductController@showCheckOut');
        Route::post('sipariskaydet', 'Frontend\ProductController@proceedCheckOut');
    });

    Route::get('{id}', 'Frontend\ProductController@show');
    Route::group(['middleware' => ['auth', 'customer']], function () {
        Route::get('{id}/sepeteekle', 'Frontend\ProductController@addToCart');
        Route::get('{id}/sepettencikar', 'Frontend\ProductController@removeFromCart');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::post('{id}/yorumyap', 'Frontend\ProductController@addReview');
    });


});

Route::group(['prefix' => 'magaza'], function () {
    Route::get('/', 'Frontend\HomeController@shopList');
    Route::get('{id}', 'Frontend\HomeController@shopDetail');

});

Route::get('storage/{path}', 'FileEntryController@show')->where('path', '(.*)');;

Route::get('testmedia', function () {
    $file = new \App\FileEntry();
    $file->storeFromUrl('http://www.istanbul.ferraridealers.com/siteasset/ferraridealer/4f74a1a219b2b/961/420/selected/-216/0/0/4f74a1a219b2b.jpg', '1', 'test');
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

Route::get('getprice', function () {
    $product = Product::find(1)->first();
    $product->categories()->detach();
});

Route::get('register', 'AuthenticationController@showRegister');
Route::post('login', 'AuthenticationController@doLogin');
Route::get('logout', 'AuthenticationController@doLogout');
Route::get('loginviainstagram', 'AuthenticationController@loginviainstagram');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::group(['prefix' => 'supplier', 'middleware' => 'supplier'], function () {
        Route::get('/', 'Dashboard\SupplierController@show');
        Route::get('edit', 'Dashboard\SupplierController@edit');
        Route::post('update', 'Dashboard\SupplierController@update');
        Route::post('updatePassword', 'Dashboard\SupplierController@updatePassword');
        Route::post('updateImages', 'Dashboard\SupplierController@updateImages');
        Route::get('confirmpayments', 'Dashboard\SupplierController@confirmPayments');
        Route::get('waitingpaymentdetail', 'Dashboard\SupplierController@waitingPaymentDetail');

        Route::group(['prefix' => 'paymentinfo'], function () {
            Route::get('/', 'Dashboard\PaymentInfoController@index');
            Route::get('create', 'Dashboard\PaymentInfoController@create');
            Route::post('store', 'Dashboard\PaymentInfoController@store');
            Route::get('edit/{id}', 'Dashboard\PaymentInfoController@edit');
            Route::any('update/{id}', 'Dashboard\PaymentInfoController@update');

        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'Dashboard\ProductController@index');
            Route::get('/edit/{id}', 'Dashboard\ProductController@edit');
            Route::post('/update/{id}', 'Dashboard\ProductController@update');
            Route::get('/setasactive/{id}', 'Dashboard\ProductController@setAsActive');
            Route::get('/setasdeactive/{id}', 'Dashboard\ProductController@setAsDeactive');
        });


    });


    Route::group(['prefix' => 'customer', 'middleware' => 'customer'], function () {
        Route::get('/', 'Dashboard\CustomerController@show');
        Route::get('edit', 'Dashboard\CustomerController@edit');
        Route::post('update', 'Dashboard\CustomerController@update');
        Route::post('updatePassword', 'Dashboard\CustomerController@updatePassword');
        Route::get('waitingorders', 'Dashboard\CustomerController@showUnpaidOrders');
        Route::get('orderdetail/{id}', 'Dashboard\CustomerController@showOrderDetail');
        Route::get('orderhistory', 'Dashboard\CustomerController@showOrderHistory');
        Route::post('submitpayment','Dashboard\CustomerController@submitPayment');
        Route::group(['prefix' => 'address'], function () {
            Route::get('/', 'Dashboard\AddressController@index');
            Route::get('create', 'Dashboard\AddressController@create');
            Route::post('store', 'Dashboard\AddressController@store');
            Route::get('edit/{id}', 'Dashboard\AddressController@edit');
            Route::any('update/{id}', 'Dashboard\AddressController@update');

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

Route::any('instagramsubscriptioncallback', 'InstagramController@subscriptioncallback');
Route::any('instagramcallback', 'InstagramController@callback');
