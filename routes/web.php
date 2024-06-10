<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Template\Template;
use App\Http\Controllers\TemplateController;
Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/getproduct', [ProductController::class,'getUserAppProduct'])->name('products.index');
    Route::get('/dashboard', [ProductController::class,'index'])->name('dashboard');
    Route::get('/addproduct',[ProductController::class,'create'])->name("products.add");
    Route::post('/addproduct',[ProductController::class,'store'])->name('addproduct');
    Route::get('/editproduct/{Productid}',[ProductController::class,'edit'])->name("products.edit");
    Route::post('/editproduct/{Productid}',[ProductController::class,'update'])->name("products.update");
    Route::get('/deleteproduct/{Productid}',[ProductController::class,'destroy'])->name("products.destroy");
    Route::get('/html', [TemplateController::class,'index']);

});
Route::get('/shopnow', [ProductController::class,'shopNow'])->name('shopnow');

require __DIR__.'/auth.php';

