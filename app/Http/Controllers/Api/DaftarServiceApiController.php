<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DaftarServiceApiController extends Controller
{
    // Menampilkan semua data daftar servis
    public function index()
    {
        $servis = DaftarService::with(['kendaraan', 'pelanggan'])->get();

        return response()->json([
            'status' => true,
            'pesan' => 'Data daftar servis berhasil ditampilkan',
            'data' => $servis
        ], 200);
    }

    // Menambahkan data daftar servis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $servis = DaftarService::create($validated);
        $servis->load(['kendaraan', 'pelanggan']);

        return response()->json([
            'status' => true,
            'pesan' => 'Data daftar servis berhasil ditambahkan',
            'data' => $servis
        ], 201);
    }

    // Menampilkan detail daftar servis
    public function show(string $id)
    {
        $servis = DaftarService::with(['kendaraan', 'pelanggan'])->find($id);

        if (!$servis) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data daftar servis tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'pesan' => 'Detail daftar servis berhasil ditampilkan',
            'data' => $servis
        ], 200);
    }

    // Mengubah data daftar servis
    public function update(Request $request, string $id)
    {
        $servis = DaftarService::find($id);

        if (!$servis) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data daftar servis tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'kendaraan_id' => 'sometimes|required|exists:kendaraans,id',
            'pelanggan_id' => 'sometimes|required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'sometimes|required|string',
            'tanggal_servis' => 'sometimes|required|date',
        ]);

        $servis->update($validated);
        $servis->load(['kendaraan', 'pelanggan']);

        return response()->json([
            'status' => true,
            'pesan' => 'Data daftar servis berhasil diubah',
            'data' => $servis
        ], 200);
    }

    // Menghapus data daftar servis
    public function destroy(string $id)
    {
        $servis = DaftarService::find($id);

        if (!$servis) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data daftar servis tidak ditemukan'
            ], 404);
        }

        $servis->delete();

        return response()->json([
            'status' => true,
            'pesan' => 'Data daftar servis berhasil dihapus'
        ], 200);
    }
}
