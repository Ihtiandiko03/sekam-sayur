<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardGudangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Middleware\Authenticate;

Route::get('/', [MainController::class, 'index']);
Route::get('/login', [MainController::class, 'login']);
Route::get('/register', [MainController::class, 'register']);
Route::post('/daftarakun', [MainController::class, 'daftarakun']);
Route::post('/loginakun', [MainController::class, 'loginakun']);
Route::post('/logout', [MainController::class, 'logout'])->name('logout');
Route::get('/debug', [MainController::class, 'debug']);

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index']);
    Route::get('/dashboard/akundriver', [DashboardAdminController::class, 'akundriver']);
    Route::get('/dashboard/driver/tambahdriver', [DashboardAdminController::class, 'tambahdriver']);
    Route::post('/dashboard/driver/simpandriver', [DashboardAdminController::class, 'simpandriver']);
    Route::get('/dashboard/driver/editdriver/{id}', [DashboardAdminController::class, 'editdriver']);
    Route::put('/dashboard/driver/simpanubahdriver', [DashboardAdminController::class, 'simpanubahdriver']);
    Route::get('/dashboard/driver/editgudang/{id}', [DashboardAdminController::class, 'editgudang']);
    Route::put('/dashboard/driver/simpanubahgudang', [DashboardAdminController::class, 'simpanubahgudang']);
    Route::delete('/dashboard/driver/hapusdriver/{id}', [DashboardAdminController::class, 'hapusdriver']);

    Route::get('/gudang', [DashboardGudangController::class, 'index']);
    Route::get('/gudang/product', [DashboardGudangController::class, 'product']);
    Route::get('/gudang/product/tambahproduct', [DashboardGudangController::class, 'tambahproduct']);
    Route::post('/gudang/product/simpanproduct', [DashboardGudangController::class, 'simpanproduct']);
    Route::get('/gudang/product/lihatproduct/{id}', [DashboardGudangController::class, 'lihatproduct']);
    Route::get('/gudang/product/editproduct/{id}', [DashboardGudangController::class, 'editproduct']);
    Route::put('/gudang/product/simpaneditproduct', [DashboardGudangController::class, 'simpaneditproduct']);
    Route::delete('/gudang/product/hapusproduct/{id}', [DashboardGudangController::class, 'hapusproduct']);




});
