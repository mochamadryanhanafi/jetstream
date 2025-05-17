<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Semua route yang butuh login dan verifikasi email
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Default dashboard (untuk user biasa)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // pastikan view ini ada
    })->middleware('role:admin')->name('admin.dashboard');

    // Petugas dashboard
    Route::get('/petugas/dashboard', function () {
        return view('petugas.dashboard'); // pastikan view ini ada
    })->middleware('role:petugas')->name('petugas.dashboard');
});
