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

// Rotta che si può levare perchè abbiamo già messo la rotta sotto con any

// Route::get('/', function () {
//     return view('guest.home');
// });

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('home');
    });

Route::get("{any?}", function () {
    return view("guest.home");
})->where("any", ".*");

