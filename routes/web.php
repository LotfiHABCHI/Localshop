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

Route::get('/', function () {
    return view('home');
});


//routes d'authentification
Auth::routes(); // créée automatiquement par le paquet d'authentification de laravel


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');

Route::get('/sellers/{id}', [App\Http\Controllers\HomeController::class, 'showProductOfSeller'])->where('id', '[0-9]+')->name('showProductOfSeller');

Route::get('/customers', [App\Http\Controllers\HomeController::class, 'customers'])->name('customers');

Route::get('/orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');

Route::get('/detail_product', [App\Http\Controllers\HomeController::class, 'detailProducts'])->name('detail_products');


//route en relation avec les commandes
Route::get('/detail_order', [App\Http\Controllers\HomeController::class, 'detailorders'])->name('detail_orders');


//routes en relation avec les produits

Route::get('/products/{id}', [App\Http\Controllers\HomeController::class, 'products'])->where('id', '[0-9]+')->name('product');

Route::get('/categories/{id}', [App\Http\Controllers\HomeController::class, 'ShowCategory'])->name('showProductsOfCategory');



//routes en relation avec le panier
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::post('/cart/update/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

Route::post('/cart/destroy/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');


Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');




Route::get('/test', [App\Http\Controllers\HomeController::class, 'showProductsinfos']);

