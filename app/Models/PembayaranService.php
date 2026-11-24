<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranService extends Model
{
    protected $table = 'pembayaran_services';

    protected $fillable = [
        'daftar_service_id',
        'jumlah_biaya',
        'jenis_pembayaran',
        'keterangan',
    ];

    public function daftarService()
    {
        return $this->belongsTo(DaftarService::class, 'daftar_service_id');
    }
}
