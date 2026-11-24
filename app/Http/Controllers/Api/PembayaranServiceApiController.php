<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;

class PembayaranServiceApiController extends Controller
{
    // Menampilkan semua pembayaran servis
    public function index()
    {
        $pembayaran = PembayaranService::with([
            'daftarService.kendaraan',
            'daftarService.pelanggan',
            'daftarService.dataService'
        ])->get();

        return response()->json([
            'status' => true,
            'pesan' => 'Data pembayaran servis berhasil ditampilkan',
            'data' => $pembayaran
        ], 200);
    }

    // Menambahkan pembayaran servis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id|unique:pembayaran_services,daftar_service_id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash / Tunai,Non Tunai',
            'keterangan' => 'required|string',
        ]);

        $pembayaran = PembayaranService::create($validated);

        $pembayaran->load([
            'daftarService.kendaraan',
            'daftarService.pelanggan',
            'daftarService.dataService'
        ]);

        return response()->json([
            'status' => true,
            'pesan' => 'Pembayaran servis berhasil ditambahkan',
            'data' => $pembayaran
        ], 201);
    }

    // Menampilkan detail pembayaran
    public function show(string $id)
    {
        $pembayaran = PembayaranService::with([
            'daftarService.kendaraan',
            'daftarService.pelanggan',
            'daftarService.dataService'
        ])->find($id);

        if (!$pembayaran) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data pembayaran servis tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'pesan' => 'Detail pembayaran servis berhasil ditampilkan',
            'data' => $pembayaran
        ], 200);
    }

    // Mengubah pembayaran servis
    public function update(Request $request, string $id)
    {
        $pembayaran = PembayaranService::find($id);

        if (!$pembayaran) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data pembayaran servis tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'daftar_service_id' => 'sometimes|required|exists:daftar_services,id|unique:pembayaran_services,daftar_service_id,' . $id,
            'jumlah_biaya' => 'sometimes|required|numeric|min:0',
            'jenis_pembayaran' => 'sometimes|required|in:Cash / Tunai,Non Tunai',
            'keterangan' => 'sometimes|required|string',
        ]);

        $pembayaran->update($validated);

        $pembayaran->load([
            'daftarService.kendaraan',
            'daftarService.pelanggan',
            'daftarService.dataService'
        ]);

        return response()->json([
            'status' => true,
            'pesan' => 'Pembayaran servis berhasil diubah',
            'data' => $pembayaran
        ], 200);
    }

    // Menghapus pembayaran servis
    public function destroy(string $id)
    {
        $pembayaran = PembayaranService::find($id);

        if (!$pembayaran) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data pembayaran servis tidak ditemukan'
            ], 404);
        }

        $pembayaran->delete();

        return response()->json([
            'status' => true,
            'pesan' => 'Pembayaran servis berhasil dihapus'
        ], 200);
    }
}
