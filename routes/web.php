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

// Route::get('/', function () {    return view('welcome');});

// LAYOOUT ROUTES

Route::get('/form',        function () {    return view('layouts.form');})->name('form');
Route::get('/index',        function () {    return view('layouts.index');})->name('index');
Route::get('/about',        function () {    return view('layouts.about');})->name('about');
Route::get('/contact',      function () {    return view('layouts.contact');})->name('contact');
Route::get('/shop-single',  function () {    return view('layouts.shop-single');})->name('shop-single');
Route::get('/shop',         function () {    return view('layouts.shop');})->name('shop');
Route::get('/',             function () {    return view('layouts.index'); })->name('/');

Auth::routes();

Route::get('/home',   function () {    return view('layouts.index');})->name('home');


// USERS

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}/disable', [UserController::class, 'disable'])->name('users.disable');
Route::get('/users/{id}/enable', [UserController::class, 'enable'])->name('users.enable');


// CATEGORIES

use App\Http\Controllers\CategoryController;

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// TYPE PRODUCT

use App\Http\Controllers\TypeProductController;

Route::get('/typeProducts', [TypeProductController::class, 'index'])->name('typeProducts.index');
Route::get('/typeProducts/create', [TypeProductController::class, 'create'])->name('typeProducts.create');
Route::post('/typeProducts', [TypeProductController::class, 'store'])->name('typeProducts.store');
Route::get('/typeProducts/{id}', [TypeProductController::class, 'show'])->name('typeProducts.show');
Route::get('/typeProducts/{id}/edit', [TypeProductController::class, 'edit'])->name('typeProducts.edit');
Route::put('/typeProducts/{id}', [TypeProductController::class, 'update'])->name('typeProducts.update');
Route::delete('/typeProducts/{id}', [TypeProductController::class, 'destroy'])->name('typeProducts.destroy');

// BRANDS


use App\Http\Controllers\BrandController;

Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/{id}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');


// PRODUCT

use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{id}/disable', [ProductController::class, 'disable'])->name('products.disable');
Route::put('/products/{id}/enable', [ProductController::class, 'enable'])->name('products.enable');

//ORDER

use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::put('/orders/{id}/accepted', [OrderController::class, 'accepted'])->name('orders.accepted');
Route::put('/orders/{id}/canceled', [OrderController::class, 'canceled'])->name('orders.canceled');
Route::put('/orders/{id}/delivered', [OrderController::class, 'delivered'])->name('orders.delivered');

// FAVORITES

use App\Http\Controllers\FavoriteController;

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

// CLIENTS

use App\Http\Controllers\ClientController;

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

// DETAIL ORDER

use App\Http\Controllers\DetailOrderController;

Route::get('/detail_orders', [DetailOrderController::class, 'index'])->name('detail_orders.index');
Route::get('/detail_orders/create', [DetailOrderController::class, 'create'])->name('detail_orders.create');
Route::post('/detail_orders', [DetailOrderController::class, 'store'])->name('detail_orders.store');
Route::get('/detail_orders/{id}', [DetailOrderController::class, 'show'])->name('detail_orders.show');
Route::get('/detail_orders/{id}/edit', [DetailOrderController::class, 'edit'])->name('detail_orders.edit');
Route::put('/detail_orders/{id}', [DetailOrderController::class, 'update'])->name('detail_orders.update');
Route::delete('/detail_orders/{id}', [DetailOrderController::class, 'destroy'])->name('detail_orders.destroy');
