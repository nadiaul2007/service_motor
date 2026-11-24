<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    // Menampilkan semua data daftar servis
    public function index()
    {
        $servis = DaftarService::with(['kendaraan', 'pelanggan'])
            ->latest()
            ->get();

        return view('daftar_service.index', compact('servis'));
    }

    // Menampilkan halaman tambah daftar servis
    public function create()
    {
        $kendaraans = Kendaraan::all();
        $pelanggans = Pelanggan::all();

        return view('daftar_service.create', compact(
            'kendaraans',
            'pelanggans'
        ));
    }

    // Menyimpan data daftar servis
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        DaftarService::create([
            'kendaraan_id' => $request->kendaraan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'keluhan_kendaraan' => $request->keluhan_kendaraan,
            'tanggal_servis' => $request->tanggal_servis,
        ]);

        return redirect()
            ->route('daftar_service.index')
            ->with('success', 'Data daftar servis berhasil ditambahkan.');
    }

    // Menampilkan detail daftar servis
    public function show($id)
    {
        $servis = DaftarService::with(['kendaraan', 'pelanggan'])
            ->findOrFail($id);

        return view('daftar_service.show', compact('servis'));
    }

    // Menampilkan halaman edit daftar servis
    public function edit($id)
    {
        $servis = DaftarService::findOrFail($id);

        $kendaraans = Kendaraan::all();
        $pelanggans = Pelanggan::all();

        return view('daftar_service.edit', compact(
            'servis',
            'kendaraans',
            'pelanggans'
        ));
    }

    // Memperbarui data daftar servis
    public function update(Request $request, $id)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $servis = DaftarService::findOrFail($id);

        $servis->update([
            'kendaraan_id' => $request->kendaraan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'keluhan_kendaraan' => $request->keluhan_kendaraan,
            'tanggal_servis' => $request->tanggal_servis,
        ]);

        return redirect()
            ->route('daftar_service.index')
            ->with('success', 'Data daftar servis berhasil diperbarui.');
    }

    // Menghapus data daftar servis
    public function destroy($id)
    {
        $servis = DaftarService::findOrFail($id);

        $servis->delete();

        return redirect()
            ->route('daftar_service.index')
            ->with('success', 'Data daftar servis berhasil dihapus.');
    }
}
