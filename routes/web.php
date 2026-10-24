<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/store', function () {
    return view('dashboard.store');
});
Route::get('/dashboard', function () {
    return view('dashboard.main-dashboard');
});


Route::get('/login' , function(){
    return view('auth.login');
});
Route::get('/register' , function(){
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/store', [ProductController::class, 'index'])->name('dashboard.store');

    Route::get('/store/products/create', [ProductController::class, 'create'])->name('dashboard.products.create');
    Route::post('/store/products', [ProductController::class, 'store'])->name('dashboard.products.store');
    Route::get('/store/products/{product}/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');
    Route::put('/store/products/{product}', [ProductController::class, 'update'])->name('dashboard.products.update');
    Route::delete('/store/products/{product}', [ProductController::class, 'destroy'])->name('dashboard.products.destroy');
});

// Route::get('/login', [AuthController::class, 'showLogin'])
//     ->middleware('guest')
//     ->name('login');
