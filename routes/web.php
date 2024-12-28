<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;

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


Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    //home Route ----------------------------------------
    Route::get('/', [HomeController::class,'home'] );

    //product routs--------------------------------------------------
    Route::get('/products', [ProductController::class,'show_all_products'])->name('all_products');
    Route::get('/products/create', [ProductController::class,'create'])->name('create_product');
    Route::post('/products/store', [ProductController::class,'store'])->name('store_product');
    Route::post('/products/delete/{id}', [ProductController::class,'destroy'])->name('delete_product');
    Route::get('/products/edit/{id}', [ProductController::class,'edit'])->name('edit_product');
    Route::post('/products/update', [ProductController::class,'update'])->name('update_product');


    //order routs ---------------------------------------------
    Route::get('/orders', [OrderController::class,'show_all_orders'])->name('page_orders');

    //Categories Routs-------------------------------------------------------
    Route::get('/categories', [CategoryController::class,'show_all_categories'])->name('page_category');
    Route::get('/category/delete/{id}', [CategoryController::class,'destroy'])->name('delete_category');
    Route::get('/category/create', [CategoryController::class,'create'])->name('create_catrgory');
    Route::post('/category/store', [CategoryController::class,'store'])->name('store_catrgory');

    //Customer Routs-------------------------------------------------------
    Route::get('/customers', [CustomerController::class,'show_all_customers'])->name('page_customer');



   

   Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
   Route::post('/payment', [StripeController::class, 'processPayment'])->name('payment.process');



   // Route::group([
       // 'middleware' => ['is_admin', 'auth'],
       // 'prefix' => 'admin',
   // ], function () {
       // Route::get('/dashboard', [AdminContrller::class, 'index'])->name('dashboard');

        //Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
        //Route::resource('/products', \App\Http\Controllers\Admin\ProductController::class);
    //});

});











































Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
