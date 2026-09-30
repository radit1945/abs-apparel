<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;

// Rute Halaman Utama & Tracking Publik
Route::get('/', [FrontController::class, 'index']);
Route::get('/cek-pesanan', [FrontController::class, 'tracking']);
Route::post('/cek-pesanan', [FrontController::class, 'cekTracking']);

// Rute Admin Dashboard & Pengaturan Hero Banner
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/settings/hero-banner', [AdminController::class, 'updateHeroBanner']);

// Rute Admin Tambah Pesanan Baru (GET untuk Tampil Form, POST untuk Simpan Data)
Route::get('/admin/tambah', [AdminController::class, 'createOrder']);
Route::post('/admin/tambah', [AdminController::class, 'storeOrder']);
Route::post('/admin/orders', [AdminController::class, 'storeOrder']);

// Rute Admin Kelola Pesanan (Update Status & Hapus Pesanan)
Route::patch('/admin/orders/{id}/status', [AdminController::class, 'updateOrderStatus']);
Route::delete('/admin/orders/{id}', [AdminController::class, 'destroyOrder']);

// Rute Admin Kelola Produk Katalog (Simpan & Hapus)
Route::post('/admin/products', [AdminController::class, 'productsStore']);
Route::delete('/admin/products/{id}', [AdminController::class, 'productsDestroy']);