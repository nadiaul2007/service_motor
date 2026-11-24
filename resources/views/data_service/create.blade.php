@extends('layouts.app')

@section('title', 'Tambah Data Servis')

@section('content')

<h2>Tambah Data Servis</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('data_service.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="daftar_service_id">ID Servis Pelanggan</label>

        <select name="daftar_service_id" id="daftar_service_id" required>
            <option value="">-- Pilih ID Servis --</option>

            @foreach ($daftarServices as $item)
                <option
                    value="{{ $item->id }}"
                    data-keluhan="{{ $item->keluhan_kendaraan }}"
                    {{ old('daftar_service_id') == $item->id ? 'selected' : '' }}
                >
                    ID: {{ $item->id }}
                    - Plat: {{ $item->kendaraan->no_plat ?? '-' }}
                    - Pelanggan: {{ $item->pelanggan->nama_lengkap ?? '-' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="keluhan_kendaraan">Keluhan Kendaraan</label>

        <textarea
            id="keluhan_kendaraan"
            rows="4"
            readonly
            placeholder="Keluhan kendaraan akan muncul otomatis"
        ></textarea>
    </div>

    <div class="form-group">
        <label for="estimasi_servis">Estimasi Servis</label>

        <input
            type="text"
            id="estimasi_servis"
            name="estimasi_servis"
            value="{{ old('estimasi_servis') }}"
            placeholder="Contoh: 2 Jam"
            required
        >
    </div>

    <div class="form-group">
        <label for="nama_mekanik">Nama Mekanik</label>

        <input
            type="text"
            id="nama_mekanik"
            name="nama_mekanik"
            value="{{ old('nama_mekanik') }}"
            placeholder="Masukkan nama mekanik"
            required
        >
    </div>

    <div class="form-group">
        <label for="sparepart_pengganti">Sparepart Pengganti</label>

        <textarea
            id="sparepart_pengganti"
            name="sparepart_pengganti"
            rows="4"
            placeholder="Masukkan sparepart pengganti"
        >{{ old('sparepart_pengganti') }}</textarea>
    </div>

    <button type="submit" class="btn">
        Simpan Data
    </button>

    <a href="{{ route('data_service.index') }}" class="btn">
        Kembali
    </a>

</form>

<script>
    const daftarServiceSelect = document.getElementById('daftar_service_id');
    const keluhanInput = document.getElementById('keluhan_kendaraan');

    function tampilkanKeluhan() {
        const pilihan = daftarServiceSelect.options[
            daftarServiceSelect.selectedIndex
        ];

        keluhanInput.value = pilihan.dataset.keluhan || '';
    }

    daftarServiceSelect.addEventListener('change', tampilkanKeluhan);

    tampilkanKeluhan();
</script>

@endsection
