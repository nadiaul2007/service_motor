<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PelangganApiController;
use App\Http\Controllers\Api\KendaraanApiController;
use App\Http\Controllers\Api\DaftarServiceApiController;
use App\Http\Controllers\Api\DataServiceApiController;
use App\Http\Controllers\Api\PembayaranServiceApiController;

// API Test
Route::get('/test', function () {
    return response()->json([
        'status' => true,
        'pesan' => 'API Service Motor berhasil terhubung!',
    ]);
});

// API Data Pelanggan
Route::apiResource('pelanggan', PelangganApiController::class);

// API Data Kendaraan
Route::apiResource('kendaraan', KendaraanApiController::class);

// API Daftar Servis
Route::apiResource('daftar-servis', DaftarServiceApiController::class);

// API Data Servis
Route::apiResource('data-servis', DataServiceApiController::class);

// API Pembayaran Servis
Route::apiResource('pembayaran-servis', PembayaranServiceApiController::class);
