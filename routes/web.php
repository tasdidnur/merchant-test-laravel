<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;

// Route::get('/', function () {
//     return view('welcome');
// });
// frontend starts here
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/merchant-register', [FrontendController::class, 'merchant_register'])->name('merchant.register');
Route::post('/merchant-insert', [FrontendController::class, 'merchant_insert'])->name('merchant.insert');
Route::domain('{shop}.localhost')->get('/laraveltest', [FrontendController::class,'shop_single'])->name('shop.single');
// frontend starts here

// admin starts here
Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->middleware(['auth', 'admin', 'verified'])->name('admin.dashboard');
// admin ends here

// merchant starts here
Route::middleware(['auth', 'merchant', 'verified'])->group(function () {
    // merchant dashboard 
    Route::get('/merchant/dashboard', function () {
        return view('merchant.home');
    })->name('merchant.dashboard');
    // merchant dashboard 
    
    // merchant store 
    Route::get('/merchant/store-list',[StoreController::class, 'store_list'])->name('merchant.store.list');
    Route::get('/merchant/create-store',[StoreController::class, 'store_create'])->name('merchant.store.create');
    Route::post('/merchant/insert-store',[StoreController::class, 'store_insert'])->name('merchant.store.insert');
    // merchant store 

    //merchant category
    Route::get('/merchant/category-list',[CategoryController::class, 'category_list'])->name('merchant.category.list');
    Route::get('/merchant/create-category',[CategoryController::class, 'category_create'])->name('merchant.category.create');
    Route::post('/merchant/insert-category',[CategoryController::class, 'category_insert'])->name('merchant.category.insert');
    //merchant category

    //merchant product
    Route::get('/merchant/product-list',[ProductController::class, 'product_list'])->name('merchant.product.list');
    Route::get('/merchant/create-product',[ProductController::class, 'product_create'])->name('merchant.product.create');
    Route::post('/merchant/insert-product',[ProductController::class, 'product_insert'])->name('merchant.product.insert');
    //ajax route for select category
    Route::get('/merchant/get-categories', [ProductController::class, 'getCategories'])->name('merchant.get.categories');
    //merchant product
});
// merchant ends here

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
