<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\CartController;
use App\Models\Products;




use Illuminate\Support\Facades\DB;

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

Route::get('/', [MainPageController::class, 'mainPage'])->name('main.page');
Route::get('/search', [MainPageController::class, 'searchProduct'])->name('search');
Route::get('/clothes', [MainPageController::class, 'clothesCategory'])->name('clothes');
Route::get('/watches', [MainPageController::class, 'watchesCategory'])->name('Watches');
Route::get('/accessories', [MainPageController::class, 'accessoriesCategory'])->name('Accessories');




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');


Route::get('auth/social', [LoginController::class, 'show'])->name('social.login');
Route::get('oauth/{driver}', [LoginController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {

    $users =DB::table('users')->get();
    return view('index', compact('users'));
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->group(function () {

    Route::get('products', [ProductsController::class, 'showProducts'])->name('products');
    Route::post('products/add', [ProductsController::class, 'addProduct'])->name('store-products');


    Route::get('ecommerce', [ProductsController::class, 'allProducts'])->name('ecommerce');
    Route::get('products/list', [ProductsController::class, 'listProducts'])->name('product.list');


    Route::get('order_details/{order_id}', [OrdersController::class, 'viewOrder']);
    Route::get('orders', [OrdersController::class, 'displayOrders'])->name('Orders');
    Route::get('products/edit/{products}', function (Products $products){
        return view('Products_Edit', compact('products'));
    })->name('product.edit');
    
    Route::post('products/update', [ProductsController::class, 'updateProduct'])->name('product.update');
    
    Route::get('products/delete/{id}', [ProductsController::class, 'deleteProduct'])->name('product.delete');
    Route::get('order/delete/{id}', [OrdersController::class, 'deleteOrder'])->name('order.delete');

    
});

Route::get('personal/details', [MainPageController::class, 'displayDetailsPage'])->name('buy');
Route::post('payment', [MainPageController::class, 'paymentProcess'])->name('payment');

Route::post('purchase/stripe', [OrdersController::class, 'stripeOrder'])->name('stripe.order');
//add to cart all route 

Route::get('/add/to/cart/{id}', [CartController::class, 'addProductToCart']);

Route::get('product/cart', [CartController::class, 'showCart'])->name('show.cart');

Route::get('check', [CartController::class, 'checkCart']);
Route::get('remove/cart/{id}', [CartController::class, 'removeCart']);
Route::post('update/cartItem', [CartController::class, 'updateCart'])->name('update.item');






