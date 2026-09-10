<?php

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

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| Kelola Alat / Barang
|--------------------------------------------------------------------------
*/

Route::resource('/admin/barang', BarangController::class)
    ->names('admin.barang');