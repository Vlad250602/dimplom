<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//main site
Route::get('/catalog', [App\Http\Controllers\ProductController::class, 'index'])->name('catalog');
Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');

//cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart-add');
Route::post('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart-remove');
Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart-clear');


//checkout
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'checkout_submit'])->name('checkout-submit');
Route::get('/thank-you', [App\Http\Controllers\CartController::class, 'thank'])->name('thank');


//product-view
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'details'])->name('product-details');

//contact
Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact'])->name('contact');

//wishlist
Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/add/{id}', [App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist-add');
Route::post('/wishlist/remove/{id}', [App\Http\Controllers\WishlistController::class, 'remove'])->name('wishlist-remove');


//------------------------------------------------------------------------------------------------//
//admin panel
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//products
Route::get('/admin-products', [App\Http\Controllers\AdminProductsController::class, 'index'])
    ->name('admin-products');

//product details
Route::get('/admin-products/details/{id}', [App\Http\Controllers\AdminProductsController::class, 'details'])
    ->name('admin-product-details');

//product create
Route::get('/admin-products/create', [App\Http\Controllers\AdminProductsController::class, 'create'])
    ->name('admin-products-create');
Route::post('/admin-products/create', [App\Http\Controllers\AdminProductsController::class, 'create_submit'])
    ->name('admin-products-create-submit');

//product edit
Route::get('/admin-products/edit/{id}', [App\Http\Controllers\AdminProductsController::class, 'edit'])
    ->name('admin-products-edit');
Route::post('/admin-products/edit/{id}', [App\Http\Controllers\AdminProductsController::class, 'edit_submit'])
    ->name('admin-products-edit-submit');

Route::get('/admin-products/edit-count/{id}', [App\Http\Controllers\AdminProductsController::class, 'change_count'])
    ->name('admin-products-edit-count');
Route::post('/admin-products/edit-count/{id}', [App\Http\Controllers\AdminProductsController::class, 'change_count_submit'])
    ->name('admin-products-edit-count-submit');


//product delete
Route::get('/admin-products/delete/{id}', [App\Http\Controllers\AdminProductsController::class, 'destroy'])
    ->name('admin-products-destroy');

//users
Route::get('/admin-users', [App\Http\Controllers\AdminUsersController::class, 'index'])
    ->name('admin-users');


//orders
Route::get('/admin-orders', [App\Http\Controllers\AdminOrdersController::class, 'index'])
    ->name('admin-orders');
Route::get('/admin-orders/details/{id}', [App\Http\Controllers\AdminOrdersController::class, 'details'])
    ->name('admin-orders-details');
Route::post('/admin-orders/complete/{id}', [App\Http\Controllers\AdminOrdersController::class, 'complete'])
    ->name('admin-orders-complete');


//sliders
Route::get('/admin-sliders', [App\Http\Controllers\SliderController::class, 'index'])
    ->name('admin-sliders');
Route::get('/admin-sliders/status/{id}', [App\Http\Controllers\SliderController::class, 'status'])
    ->name('admin-sliders-status');
Route::get('/admin-sliders/delete/{id}', [App\Http\Controllers\SliderController::class, 'destroy'])
    ->name('admin-sliders-destroy');

Route::get('/admin-sliders/create', [App\Http\Controllers\SliderController::class, 'create'])
    ->name('admin-sliders-create');
Route::post('/admin-sliders/create-submit', [App\Http\Controllers\SliderController::class, 'create_submit'])
    ->name('admin-sliders-create-submit');

Auth::routes();
