<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/getproduct', [ProductController::class, 'getUserAppProduct'])->name('products.add');
    Route::get('/getproduct', [ProductController::class, 'getUserAppProduct'])->name('products.index');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    Route::get('/addproduct', [ProductController::class, 'create'])->name('products.add');
    Route::post('/addproduct', [ProductController::class, 'store'])->name('addproduct');
    Route::get('/editproduct/{Productid}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/editproduct/{Productid}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/deleteproduct/{Productid}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/html', [TemplateController::class, 'index']);

   
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
   Route::get('/categories/{category}/products', [CategoryController::class, 'showProducts'])->name('categories.products');

    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::patch('/categories/{category}', [CategoryController::class, 'update']);
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/category/{category_code}', [ProductController::class, 'showCategoryName']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/shopnow', [ProductController::class, 'shopNow'])->name('shopnow');
    
});

Route::get('/shopnow', [ProductController::class, 'shopNow'])->name('shopnow');

require __DIR__.'/auth.php';



