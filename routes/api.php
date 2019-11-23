<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->name('api.')->prefix('v1')->group(function () {
    Route::post('register', 'Api\AuthController@register')->name('register');
    Route::post('login', 'Api\AuthController@login')->name('login');

    Route::group(['middleware' => ['auth:api']], function () {
        // Authenticated API
        Route::post('logout', 'Api\AuthController@logout')->name('logout');
        Route::post('refresh', 'Api\AuthController@refresh')->name('refresh');

        // CRUD brand
        Route::resource('brand', 'Api\BrandController')->only(['index', 'show']);

        // CRUD Category
        Route::resource('category', 'Api\CategoryController')->only(['index', 'show']);

        // CRUD product
        Route::get('product/top-seller', 'Api\ProductController@topSeller')->name('product.topSeller');
        Route::resource('product', 'Api\ProductController')->only(['index', 'show', 'store', 'update', 'destroy']);

        // Order Route
        Route::resource('order', 'Api\OrderController')->except(['edit', 'update', 'show']);
        Route::get('order/status/{status}', 'Api\OrderController@getStatus')->name('order.getByStatus');
        Route::match(['put', 'patch'], 'order/status/{id}/change', 'Api\OrderController@changeStatus')->name('order.change.status');
        Route::get('order/product/{order}', 'Api\OrderController@showByProduct')->name('order.showByProduct');
        Route::get('order/order-number/{id}', 'Api\OrderController@byOrderNumber')->name('order.byOrderNumber');
    });
});
