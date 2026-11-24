<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceApiController extends Controller
{
    // Menampilkan semua data servis
    public function index()
    {
        $dataServis = DataService::with([
            'daftarService.kendaraan',
            'daftarService.pelanggan'
        ])->get();

        return response()->json([
            'status' => true,
            'pesan' => 'Data servis berhasil ditampilkan',
            'data' => $dataServis
        ], 200);
    }

    // Menambahkan data servis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'estimasi_servis' => 'required|string|max:255',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'required|string',
        ]);

        $dataServis = DataService::create($validated);

        $dataServis->load([
            'daftarService.kendaraan',
            'daftarService.pelanggan'
        ]);

        return response()->json([
            'status' => true,
            'pesan' => 'Data servis berhasil ditambahkan',
            'data' => $dataServis
        ], 201);
    }

    // Menampilkan detail data servis
    public function show(string $id)
    {
        $dataServis = DataService::with([
            'daftarService.kendaraan',
            'daftarService.pelanggan'
        ])->find($id);

        if (!$dataServis) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data servis tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'pesan' => 'Detail data servis berhasil ditampilkan',
            'data' => $dataServis
        ], 200);
    }

    // Mengubah data servis
    public function update(Request $request, string $id)
    {
        $dataServis = DataService::find($id);

        if (!$dataServis) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data servis tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'daftar_service_id' => 'sometimes|required|exists:daftar_services,id',
            'estimasi_servis' => 'sometimes|required|string|max:255',
            'nama_mekanik' => 'sometimes|required|string|max:255',
            'sparepart_pengganti' => 'sometimes|required|string',
        ]);

        $dataServis->update($validated);

        $dataServis->load([
            'daftarService.kendaraan',
            'daftarService.pelanggan'
        ]);

        return response()->json([
            'status' => true,
            'pesan' => 'Data servis berhasil diubah',
            'data' => $dataServis
        ], 200);
    }

    // Menghapus data servis
    public function destroy(string $id)
    {
        $dataServis = DataService::find($id);

        if (!$dataServis) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data servis tidak ditemukan'
            ], 404);
        }

        $dataServis->delete();

        return response()->json([
            'status' => true,
            'pesan' => 'Data servis berhasil dihapus'
        ], 200);
    }
}
