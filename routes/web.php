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



Route::get('/sellers/{id}', [App\Http\Controllers\HomeController::class, 'showProductsOfSeller'])->where('id', '[0-9]+')->name('showProductOfSeller');

Route::get('/customers', [App\Http\Controllers\HomeController::class, 'customers'])->name('customers');

Route::get('/orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');

Route::get('/detail_product', [App\Http\Controllers\HomeController::class, 'detailProducts'])->name('detail_products');


//route en relation avec les commandes
Route::get('/detail_order/{orderId}', [App\Http\Controllers\HomeController::class, 'ordersOfCustomer'])->where('orderId', '[0-9]+')->name('detail_orders');
//peut etre changer le nom de la vue ??


//routes en relation avec les produits

Route::get('/products/{id}', [App\Http\Controllers\HomeController::class, 'products'])->where('id', '[0-9]+')->name('product');

Route::get('/categories/{id}', [App\Http\Controllers\HomeController::class, 'ShowCategory'])->name('showProductsOfCategory');



//routes en relation avec le panier
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::post('/cart/update/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

Route::post('/cart/destroy/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');


Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');




Route::post('/test', [App\Http\Controllers\HomeController::class, 'test']);
Route::view('test', 'test');



Route::get('/customer_register', [App\Http\Controllers\CustomerController::class, 'showRegisterForm'])->name('customer_register');
Route::post('/customer_register', [App\Http\Controllers\CustomerController::class, 'customerRegister'])->name('customer_register.post');

Route::get('/customer_login', [App\Http\Controllers\CustomerController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer_login', [App\Http\Controllers\CustomerController::class, 'login'])->name('customer_login.post');

Route::get('/seller_login', [App\Http\Controllers\HomeController::class, 'showLoginForm'])->name('seller.login');
Route::post('/seller_login', [App\Http\Controllers\HomeController::class, 'login'])->name('seller_login.post');

Route::get('/seller_register', [App\Http\Controllers\HomeController::class, 'showRegisterForm'])->name('seller_register');
Route::post('/seller_register', [App\Http\Controllers\HomeController::class, 'sellerRegister'])->name('seller_register.post');

Route::get('/changepass', [App\Http\Controllers\HomeController::class, 'showChangePasswordForm'])->name('changepass');
Route::post('/changepass', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('changepass.post');

Route::get('/reset_password', [App\Http\Controllers\HomeController::class, 'showResetPasswordForm'])->name('reset_password');
Route::post('/reset_password', [App\Http\Controllers\HomeController::class, 'resetPassword'])->name('reset_password.post');



Route::get('/add_product', [App\Http\Controllers\SellerController::class, 'showAddProductForm'])->name('add_product');
Route::post('/add_product', [App\Http\Controllers\SellerController::class, 'addProduct'])->name('add_product.post');



