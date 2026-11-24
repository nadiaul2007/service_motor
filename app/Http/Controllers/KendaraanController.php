<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan semua data kendaraan
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();

        return view('kendaraan.index', compact('kendaraans'));
    }

    // Menampilkan halaman tambah kendaraan
    public function create()
    {
        return view('kendaraan.create');
    }

    // Menyimpan data kendaraan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat' => 'required|string|max:20',
            'jenis_kendaraan' => 'required|string|max:100',
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:100',
            'warna_kendaraan' => 'required|string|max:50',
        ]);

        Kendaraan::create($validated);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    // Menampilkan detail kendaraan
    public function show($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view('kendaraan.show', compact('kendaraan'));
    }

    // Menampilkan halaman edit kendaraan
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view('kendaraan.edit', compact('kendaraan'));
    }

    // Memperbarui data kendaraan
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $validated = $request->validate([
            'no_plat' => 'required|string|max:20',
            'jenis_kendaraan' => 'required|string|max:100',
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:100',
            'warna_kendaraan' => 'required|string|max:50',
        ]);

        $kendaraan->update($validated);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui!');
    }

    // Menghapus data kendaraan
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus!');
    }
}
