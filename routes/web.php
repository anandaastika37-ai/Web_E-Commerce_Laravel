<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

// Etalase (publik)
Route::get('/produk', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/kategori', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/koleksi-baru', [CatalogController::class, 'newArrivals'])->name('catalog.new');
Route::get('/promo', [CatalogController::class, 'promo'])->name('catalog.promo');

// Tamu
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Semua user yang login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/profile', 'dashboard.profile')->name('profile');
    // Pengarah otomatis sesuai role
    Route::get('/dashboard', function (Request $request) {
        /** @var \App\Models\User $user */
        $user = $request->user();

        return redirect()->route($user->isSeller() ? 'dashboard.store' : 'buyer.dashboard');
    })->name('dashboard');
});

// Khusus buyer
Route::middleware(['auth', 'role:buyer'])->prefix('buyer')->name('buyer.')->group(function () {
    Route::view('/dashboard', 'dashboard.main-dashboard')->name('dashboard');
});

// Khusus seller
Route::middleware(['auth', 'role:seller'])->group(function () {

    // di luar grup bernama 'dashboard.'
    Route::get('/store/build', [StoreController::class, 'index'])->name('store.setup');
    Route::post('/store', [StoreController::class, 'store'])->name('store.store');
    Route::view('/dashboard', 'dashboard.main-dashboard')->name('dashboard');

    Route::prefix('store')->name('dashboard.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('store');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});

