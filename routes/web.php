<?php

use Illuminate\Support\Facades\Route;
use App\Models\People;

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
Route::get('/orders/{customerId}', [App\Http\Controllers\HomeController::class, 'ordersOfCustomer'])->where('customerId', '[0-9]+')->name('order');

Route::get('/detail_orders/{orderId}', [App\Http\Controllers\HomeController::class, 'detailOrder'])->where('orderId', '[0-9]+')->name('detail_order');


//routes en relation avec les produits

Route::get('/products/{id}', [App\Http\Controllers\HomeController::class, 'products'])->where('id', '[0-9]+')->name('product');

Route::get('/categories/{id}', [App\Http\Controllers\HomeController::class, 'ShowCategory'])->name('showProductsOfCategory');



//routes en relation avec le panier
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::post('/cart/update/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

Route::post('/cart/destroy/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');






Route::post('/test', [App\Http\Controllers\HomeController::class, 'test']);
Route::view('test', 'test');

Route::get('/test', [App\Http\Controllers\HomeController::class, 'showProductsinfos']);


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


// les routes pour recevoir le lien de réinitialisation
Route::get('/reset', [App\Http\Controllers\HomeController::class, 'showResetForm'])->name('reset');
Route::post('/reset', [App\Http\Controllers\HomeController::class, 'reset'])->name('reset.post');

// les route pour réinitialiser
Route::get('/reset_password', [App\Http\Controllers\HomeController::class, 'showResetPasswordForm'])->name('reset_password');
Route::post('/reset_password', [App\Http\Controllers\HomeController::class, 'resetPassword'])->name('reset_password.post');







Route::get('/add_product', [App\Http\Controllers\SellerController::class, 'showAddProductForm'])->name('add_product');
Route::post('/add_product', [App\Http\Controllers\SellerController::class, 'addProduct'])->name('add_product.post');


/*Route::get('/contact', function () {
    return new App\Mail\Contact([
      'nom' => 'Durand',
      'email' => 'durand@chezlui.com',
      'message' => 'Je voulais vous dire que votre site est magnifique !'
      ]);
});*/

Route::get('/nousContacter', [App\Http\Controllers\HomeController::class, 'showFormContact'])->name('contact');
Route::post('/nousContacter', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact.post');

Route::get('/orderCart', [App\Http\Controllers\CartController::class, 'contact'])->name('orderCart');
Route::post('/orderCart', [App\Http\Controllers\CartController::class, 'contact'])->name('order.post');



Route::get('/sellerProducts/{sellerId}', [App\Http\Controllers\SellerController::class, 'productsOfSeller'])->where('sellerId', '[0-9]+')->name('sellerProducts');
Route::post('/sellerProducts/{productId}', [App\Http\Controllers\SellerController::class, 'updateStock'])->where('productId', '[0-9]+')->name('stock.update');

/*Route::get('/contact', function () {
    $people=DB::table('people')->where('email', 'v1@gmail.com')->get();
    return new App\Mail\Contact([
      'nom' => $people[0]->firstname,
      'email' => $people[0]->email,
      'message' => 'Je voulais vous dire que votre site est magnifique !'
      ]);
});*/
Route::get('search_product/', [App\Http\Controllers\HomeController::class, 'search'])->name('searchProduct');

Route::get('faq', [App\Http\Controllers\HomeController::class, 'faq']);


Route::post('/sellerProducts/{sellerId}', [App\Http\Controllers\SellerController::class, 'editDescription'])->where('sellerId', '[0-9]+')->name('desc.edit');
Route::post('/sellerProducts', [App\Http\Controllers\SellerController::class, 'editDescription'])->name('desc.edit');

Route::get('/orderValidation', [App\Http\Controllers\SellerController::class, 'orderValidation'])->name('orderValidate'); 
Route::post('/orderValidation', [App\Http\Controllers\SellerController::class, 'contact'])->name('orderValidate.post'); 


/*route checkout payement*/
Route::get('payement', [App\Http\Controllers\CheckOutController::class, 'index'])->name('checkout.index');
Route::post('payement', [App\Http\Controllers\CheckOutController::class, 'store'])->name('checkout.store');
Route::get('/merci', function(){
    return view('payement_success');
});