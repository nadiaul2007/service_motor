<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
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
}
