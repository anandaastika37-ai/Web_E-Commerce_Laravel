<?php

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
Route::get('/add', function () {
    return view('dashboard.add-product');
});
