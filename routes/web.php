<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('kategori.store');
        Route::put('/admin/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/admin/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

        Route::get('/admin/aspirasi', [PengaduanController::class, 'index'])->name('admin.pengaduan.index');
        Route::delete('/admin/aspirasi/{pengaduan}', [PengaduanController::class, 'destroy'])->name('admin.pengaduan.destroy');
        Route::get('/admin/aspirasi/{pengaduan}/proses', [PengaduanController::class, 'process'])->name('admin.pengaduan.edit');
        Route::put('/admin/aspirasi/{pengaduan}/proses', [PengaduanController::class, 'feedback'])->name('admin.pengaduan.feedback');
        Route::get('/admin/aspirasi/detail/{pengaduan}', [PengaduanController::class, 'showAdmin'])->name('admin.pengaduan.show');
    });

    Route::middleware(['role:siswa'])->group(function () {
        Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');

        Route::get('/siswa/aspirasi', [PengaduanController::class, 'create'])->name('siswa.pengaduan.create');
        Route::post('/siswa/aspirasi', [PengaduanController::class, 'store'])->name('siswa.pengaduan.store');
        Route::get('/siswa/aspirasi/{pengaduan}/edit', [PengaduanController::class, 'edit'])->name('siswa.pengaduan.edit');
        Route::put('/siswa/aspirasi/{pengaduan}', [PengaduanController::class, 'update'])->name('siswa.pengaduan.update');
        Route::delete('/siswa/aspirasi/{pengaduan}', [PengaduanController::class, 'destroy'])->name('siswa.pengaduan.destroy');
        Route::get('/siswa/aspirasi/detail/{pengaduan}', [PengaduanController::class, 'show'])->name('siswa.pengaduan.show');

        Route::get('/siswa/histori-aspirasi', [PengaduanController::class, 'histori'])->name('siswa.pengaduan.histori');
    });

});
