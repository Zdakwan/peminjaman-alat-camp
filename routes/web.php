<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/katalog', [HomeController::class, 'search'])->name('katalog.search');
Route::get('/katalog/semua', [HomeController::class, 'index'])->name('katalog.index');
Route::get('/produk/{id}', [HomeController::class, 'show'])->name('produk.show');

Route::post('/keranjang/{id}', [CartController::class, 'add'])->name('cart.add');