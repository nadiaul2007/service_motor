<?php

namespace App\Http\Controllers;

use App\Models\PembayaranService;
use App\Models\DaftarService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PembayaranServiceController extends Controller
{
    // Menampilkan semua pembayaran
    public function index()
    {
        $pembayaranServices = PembayaranService::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan'
        ])->latest()->get();

        return view(
            'pembayaran_service.index',
            compact('pembayaranServices')
        );
    }

    // Menampilkan form tambah pembayaran
    public function create()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        return view(
            'pembayaran_service.create',
            compact('daftarServices')
        );
    }

    // Menyimpan pembayaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => [
                'required',
                'exists:daftar_services,id',
                'unique:pembayaran_services,daftar_service_id',
            ],

            'jumlah_biaya' => 'required|numeric|min:0',

            'jenis_pembayaran' => [
                'nullable',
                Rule::in(['Cash / Tunai', 'Non Tunai']),
            ],

            'keterangan' => 'nullable|string',
        ]);

        PembayaranService::create($validated);

        return redirect()
            ->route('pembayaran_service.index')
            ->with('success', 'Pembayaran servis berhasil ditambahkan.');
    }

    // Menampilkan detail pembayaran
    public function show($id)
    {
        $pembayaranService = PembayaranService::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan'
        ])->findOrFail($id);

        return view(
            'pembayaran_service.show',
            compact('pembayaranService')
        );
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $pembayaranService = PembayaranService::findOrFail($id);

        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        return view(
            'pembayaran_service.edit',
            compact('pembayaranService', 'daftarServices')
        );
    }

    // Memperbarui pembayaran
    public function update(Request $request, $id)
    {
        $pembayaranService = PembayaranService::findOrFail($id);

        $validated = $request->validate([
            'daftar_service_id' => [
                'required',
                'exists:daftar_services,id',
                Rule::unique('pembayaran_services', 'daftar_service_id')
                    ->ignore($pembayaranService->id),
            ],

            'jumlah_biaya' => 'required|numeric|min:0',

            'jenis_pembayaran' => [
                'nullable',
                Rule::in(['Cash / Tunai', 'Non Tunai']),
            ],

            'keterangan' => 'nullable|string',
        ]);

        $pembayaranService->update($validated);

        return redirect()
            ->route('pembayaran_service.index')
            ->with('success', 'Pembayaran servis berhasil diperbarui.');
    }

    // Menghapus pembayaran
    public function destroy($id)
    {
        $pembayaranService = PembayaranService::findOrFail($id);

        $pembayaranService->delete();

        return redirect()
            ->route('pembayaran_service.index')
            ->with('success', 'Pembayaran servis berhasil dihapus.');
    }
}
