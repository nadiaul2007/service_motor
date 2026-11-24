<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataService extends Model
{
    use HasFactory;

    protected $table = 'data_services';

    protected $fillable = [
        'daftar_service_id',
        'estimasi_servis',
        'nama_mekanik',
        'sparepart_pengganti',
    ];

    public function daftarService()
    {
        return $this->belongsTo(DaftarService::class, 'daftar_service_id');
    }

    public function pembayaranService()
    {
        return $this->hasOne(PembayaranService::class, 'data_service_id');
    }
}
