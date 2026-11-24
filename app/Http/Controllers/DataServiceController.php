<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DataServiceController extends Controller
{
    // Menampilkan semua data servis
    public function index()
    {
        $dataServices = DataService::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan'
        ])->latest()->get();

        return view('data_service.index', compact('dataServices'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        return view('data_service.create', compact('daftarServices'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => [
                'required',
                'exists:daftar_services,id',
                'unique:data_services,daftar_service_id',
            ],
            'estimasi_servis' => 'required|string',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        DataService::create($validated);

        return redirect()->route('data_service.index')
            ->with('success', 'Data servis berhasil ditambahkan!');
    }

    // Menampilkan detail data
    public function show(DataService $dataService)
    {
        $dataService->load([
            'daftarService.pelanggan',
            'daftarService.kendaraan'
        ]);

        return view('data_service.show', compact('dataService'));
    }

    // Menampilkan form edit
    public function edit(DataService $dataService)
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        return view('data_service.edit', compact(
            'dataService',
            'daftarServices'
        ));
    }

    // Memperbarui data
    public function update(Request $request, DataService $dataService)
    {
        $validated = $request->validate([
            'daftar_service_id' => [
                'required',
                'exists:daftar_services,id',
                Rule::unique('data_services', 'daftar_service_id')
                    ->ignore($dataService->id),
            ],
            'estimasi_servis' => 'required|string',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService->update($validated);

        return redirect()->route('data_service.index')
            ->with('success', 'Data servis berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy(DataService $dataService)
    {
        $dataService->delete();

        return redirect()->route('data_service.index')
            ->with('success', 'Data servis berhasil dihapus!');
    }
}
