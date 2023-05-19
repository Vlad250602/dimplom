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

//checkout
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'checkout_submit'])->name('checkout-submit');


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

//product delete
Route::get('/admin-products/delete/{id}', [App\Http\Controllers\AdminProductsController::class, 'destroy'])
    ->name('admin-products-destroy');

//users
Route::get('/admin-users', [App\Http\Controllers\AdminUsersController::class, 'index'])
    ->name('admin-users');



Auth::routes();
