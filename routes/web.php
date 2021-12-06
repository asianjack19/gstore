<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (App::environment('production')) {
    URL::forceScheme('http');
}

Auth::routes();

// Main Page Endpoint
Route::get('/', function () {
    return view('welcome');
});

// Home Page Endpoint
Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');

// Users Endpoints
Route::prefix('users')->group(function () {
    Route::get('/', 'App\Http\Controllers\UserController@getUsers')->name('user.list');
    Route::get('/details', 'App\Http\Controllers\UserController@getUserDetailsByID')->name('user.details');
    Route::get('/profile', 'App\Http\Controllers\UserController@getUpdateProfilePage')->name('user.profile')->middleware('auth');
    Route::post('/profile/{id}', 'App\Http\Controllers\UserController@updateProfile')->name('user.profile.update')->middleware('auth');
    Route::get('/topup', 'App\Http\Controllers\UserController@getUpdateBalance')->name('user.balance')->middleware('auth');
    Route::post('/topup/{id}', 'App\Http\Controllers\UserController@updateBalance')->name('user.balance.update')->middleware('auth');
});


// Products Endpoints
Route::prefix('products')->group(function () {
    Route::get('/', 'App\Http\Controllers\ProductController@getProducts')->name('product.list');
    Route::get('/details', 'App\Http\Controllers\ProductController@getProductDetailsByID')->name('product.details');
    Route::get('/upload', 'App\Http\Controllers\ProductController@getUploadProductPage')->name('product.upload')->middleware('auth');
    Route::post('/upload', 'App\Http\Controllers\ProductController@uploadProduct')->name('product.upload.submit')->middleware('auth');
    Route::get('/edit', 'App\Http\Controllers\ProductController@getEditProductPage')->name('product.edit')->middleware('auth');
    Route::post('/edit/{id}', 'App\Http\Controllers\ProductController@editProduct')->name('product.edit.submit')->middleware('auth');
});

//Categories Endpoints
Route::prefix('categories')->group(function () {
    Route::get('/', 'App\Http\Controllers\CategoryController@getCategories')->name('category.list');
});

//Orders Endpoints
Route::prefix('orders')->group(function () {
    Route::get('/create', 'App\Http\Controllers\OrderController@getOrderPage')->name('order.page')->middleware('auth');
    Route::post('/create/{id}', 'App\Http\Controllers\OrderController@createOrder')->name('order.create')->middleware('auth');
    Route::get('/', 'App\Http\Controllers\OrderController@getOrders')->name('order.list')->middleware('auth');
    Route::get('/details', 'App\Http\Controllers\OrderController@getOrderDetail')->name('order.details')->middleware('auth');
});
