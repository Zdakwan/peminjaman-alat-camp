<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;


Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/barang', BarangController::class)
        ->names('admin.barang');

    Route::resource('/admin/admins', AdminController::class)
        ->except(['show'])
        ->names('admin.admins');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/katalog/cari', [HomeController::class, 'search'])->name('katalog.search');
Route::get('/produk/{id}', [HomeController::class, 'show'])->name('produk.show');
Route::post('/cart/{id}', [CartController::class, 'add'])->name('cart.add');

Route::get('/syarat-ketentuan', function () {
    return view('syarat-ketentuan');
})->name('syarat-ketentuan');
Route::get('/cara-sewa', function () {
    return view('cara-sewa');
})->name('cara-sewa');
Route::get('/pusat-bantuan', function () {
    return view('pusat-bantuan');
});
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/barang', BarangController::class)
        ->names('admin.barang');
});


/*
|--------------------------------------------------------------------------
| Area Setelah Login (User)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
