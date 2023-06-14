<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('layouts.index');
})->name('index');
Route::get('/about', function () {
    return view('layouts.about');
})->name('about');
Route::get('/contact', function () {
    return view('layouts.contact');
})->name('contact');
Route::get('/shop-single', function () {
    return view('layouts.shop-single');
})->name('shop-single');
Route::get('/shop', function () {
    return view('layouts.shop');
})->name('shop');


Route::get('/', function () {
    return view('layouts.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
