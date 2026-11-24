<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    protected $table = 'daftar_services';

    protected $fillable = [
        'kendaraan_id',
        'pelanggan_id',
        'keluhan_kendaraan',
        'tanggal_servis',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    public function dataService()
    {
        return $this->hasOne(DataService::class, 'daftar_service_id');
    }

    public function pembayaranService()
    {
        return $this->hasOne(PembayaranService::class, 'daftar_service_id');
    }
}
