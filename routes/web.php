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

Auth::routes();

// Main Page Endpoint
Route::get('/', function () {
    return view('welcome');
});

// Home Page Endpoint
Route::get('/home',function(){
    return view('home');
})->name('home');

// Users Endpoints
Route::prefix('users')->group(function () {
    Route::get('/', 'App\Http\Controllers\UserController@getUsers')->name('user.list');
    Route::get('/details', 'App\Http\Controllers\UserController@getUserDetailsByID')->name('user.details');
    Route::get('/profile', 'App\Http\Controllers\UserController@getUpdateProfilePage')->name('user.profile')->middleware('auth');
    Route::post('/profile/{id}', 'App\Http\Controllers\UserController@updateProfile')->name('user.profile.update')->middleware('auth');
});


// Products Endpoints
Route::prefix('products')->group(function () {
    Route::get('/', 'App\Http\Controllers\ProductController@getProducts')->name('product.list');
    Route::get('/details', 'App\Http\Controllers\ProductController@getProductDetailsByID')->name('product.details');
});
