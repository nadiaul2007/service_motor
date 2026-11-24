<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranServiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pelanggan', PelangganController::class);

Route::resource('kendaraan', KendaraanController::class);

Route::resource('daftar-service', DaftarServiceController::class)
    ->names('daftar_service')
    ->parameters([
        'daftar-service' => 'daftar_service'
    ]);

Route::resource('data-service', DataServiceController::class)
    ->names('data_service')
    ->parameters([
        'data-service' => 'data_service'
    ]);

Route::resource('pembayaran-service', PembayaranServiceController::class)
    ->names('pembayaran_service')
    ->parameters([
        'pembayaran-service' => 'pembayaran_service'
    ]);
