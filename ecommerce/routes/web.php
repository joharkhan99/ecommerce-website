<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
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

// DASHBOARD
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('customer_registration', [DashboardController::class, 'customer_registration'])->name('customer_registration');
Route::post('vendor_registration', [DashboardController::class, 'vendor_registration'])->name('vendor_registration');

Route::post('add_category', [DashboardController::class, 'add_category'])->name('add_category');

// PRODUCT
Route::get('add_product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('create_product', [ProductController::class, 'create_product'])->name('create_product');
Route::get('view_product', [ProductController::class, 'view_product'])->name('view_product');
Route::post('change_product_availability', [ProductController::class, 'change_product_availability'])->name('change_product_availability');
Route::get('edit_product/{pid}', [ProductController::class, 'edit_product'])->name('edit_product');
Route::post('update_product', [ProductController::class, 'update_product'])->name('update_product');
Route::get('delete_product/{pid}', [ProductController::class, 'delete_product'])->name('delete_product');

Route::post('add_review', [ProductController::class, 'add_review'])->name('add_review');
Route::post('add_to_cart', [ProductController::class, 'add_to_cart'])->name('add_to_cart');

// USER ROUTES
Route::get('product_history', [DashboardController::class, 'product_history'])->name('product_history');
Route::get('your_reviews', [DashboardController::class, 'your_reviews'])->name('your_reviews');
Route::get('your_orders', [DashboardController::class, 'your_orders'])->name('your_orders');

// FRONTEND
Route::get('/', function () {
    return view('frontend.pages.home');
});
Route::get('product/{id}', [ShopController::class, 'view_product']);
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('filter_category/{category}', [ShopController::class, 'filter_category'])->name('filter_category');
Route::post('filter_gender', [ShopController::class, 'filter_gender'])->name('filter_gender');
Route::post('filter_price', [ShopController::class, 'filter_price'])->name('filter_price');
Route::post('sort_by_date', [ShopController::class, 'sort_by_date'])->name('sort_by_date');
Route::get('cart', [ShopController::class, 'cart'])->name('cart');


// AUTH
Route::get('registration', [AuthController::class, 'auth']);
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
