<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganApiController extends Controller
{
    // Menampilkan semua data pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::all();

        return response()->json([
            'status' => true,
            'pesan' => 'Data pelanggan berhasil ditampilkan',
            'data' => $pelanggan
        ], 200);
    }

    // Menambahkan data pelanggan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat_pelanggan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $pelanggan = Pelanggan::create($validated);

        return response()->json([
            'status' => true,
            'pesan' => 'Data pelanggan berhasil ditambahkan',
            'data' => $pelanggan
        ], 201);
    }

    // Menampilkan detail satu pelanggan
    public function show(string $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data pelanggan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'pesan' => 'Detail pelanggan berhasil ditampilkan',
            'data' => $pelanggan
        ], 200);
    }

    // Mengubah data pelanggan
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data pelanggan tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama_lengkap' => 'sometimes|required|string|max:255',
            'no_hp' => 'sometimes|required|string|max:20',
            'alamat_pelanggan' => 'sometimes|required|string',
            'pekerjaan' => 'sometimes|required|string|max:255',
        ]);

        $pelanggan->update($validated);

        return response()->json([
            'status' => true,
            'pesan' => 'Data pelanggan berhasil diubah',
            'data' => $pelanggan
        ], 200);
    }

    // Menghapus data pelanggan
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'status' => false,
                'pesan' => 'Data pelanggan tidak ditemukan'
            ], 404);
        }

        $pelanggan->delete();

        return response()->json([
            'status' => true,
            'pesan' => 'Data pelanggan berhasil dihapus'
        ], 200);
    }
}
