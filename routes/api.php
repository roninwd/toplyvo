<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', static function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api\v1'], static function () {

    Route::apiResource('/category', 'CategoryController')->only(['index', 'show']);
    Route::get('/product/{product}', 'ProductController@show')->name('product.show');
    Route::put('/order/{order}/change_status', 'OrderController@changeStatus')->name('order.change_status');
    Route::get('/order/{order}/show_status', 'OrderController@showStatus')->name('order.show_status');
    Route::apiResource('/order', 'OrderController');
    Route::post('/payment/{order}', 'PaymentController@handle');
});
