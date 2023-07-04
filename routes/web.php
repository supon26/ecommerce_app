<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ProductController;


Route::controller(FrontendController::class)->group(function(){
    Route::get('/','index')->name('frontend.home');
    Route::get('/shop','shop')->name('frontend.shop');
    Route::get('/singleProduct/{id}','singleProduct')->name('frontend.single.product');
    Route::get('/cart','cartProduct')->name('frontend.cart');
    Route::get('/checkout','checkoutProduct')->name('frontend.checkout');
});

// Admin Logout:
Route::get('/adminLogout',[AdminController::class,'destroy'])->name('admin.logout');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Products Routes :
Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index')->name('products.index');
    Route::post('/product/add','store')->name('product.add');
    Route::get('/product/manage','show')->name('product.manage');
    Route::get('/product/atoi/{id}','atoi')->name('product.atoi');
    Route::get('/product/itoa/{id}','itoa')->name('product.itoa');
    Route::get('/product/delete/{id}','destroy')->name('product.delete');
    Route::get('/product/edit/{id}','edit')->name('product.edit');
    Route::post('/product/update/{id}','update')->name('product.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
