<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BarangController;


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
});
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

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| Kelola Alat / Barang
|--------------------------------------------------------------------------
*/

Route::resource('/admin/barang', BarangController::class)
    ->names('admin.barang');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
