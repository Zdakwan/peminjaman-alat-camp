<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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