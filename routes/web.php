<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard utama, cek role di controller dan tampilkan view sesuai role
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kamu bisa tetap buat route khusus kalau mau, tapi tanpa middleware:
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/petugas/dashboard', [DashboardController::class, 'petugas'])->name('petugas.dashboard');
});
