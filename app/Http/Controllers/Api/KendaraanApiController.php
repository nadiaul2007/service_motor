<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanApiController extends Controller
{
    // Menampilkan semua data kendaraan
    public function index()
    {
        $kendaraan = Kendaraan::all();

        return response()->json([
            'status' => true,
            'pesan' => 'Data kendaraan berhasil ditampilkan',
            'data' => $kendaraan
        ], 200);
    }

    // Menambahkan data kendaraan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:255',
        ]);

        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'status' => true,
            'pesan' => 'Data kendaraan berhasil ditambahkan',
            'data' => $kendaraan
        ], 201);
    }

    // Menampilkan detail kendaraan
    public function show(string $id)
    {
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data kendaraan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'pesan' => 'Detail kendaraan berhasil ditampilkan',
            'data' => $kendaraan
        ], 200);
    }

    // Mengubah data kendaraan
    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data kendaraan tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'no_plat' => 'sometimes|required|string|max:255',
            'jenis_kendaraan' => 'sometimes|required|string|max:255',
            'no_stnk' => 'sometimes|required|string|max:255',
            'tahun_pembuatan' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'sometimes|required|string|max:255',
            'warna_kendaraan' => 'sometimes|required|string|max:255',
        ]);

        $kendaraan->fill($validated);
        $kendaraan->save();

        return response()->json([
            'status' => true,
            'pesan' => 'Data kendaraan berhasil diubah',
            'data' => $kendaraan
        ], 200);
    }

    // Menghapus data kendaraan
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data kendaraan tidak ditemukan'
            ], 404);
        }

        $kendaraan->delete();

        return response()->json([
            'status' => true,
            'pesan' => 'Data kendaraan berhasil dihapus'
        ], 200);
    }
}
