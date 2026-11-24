@extends('layouts.app')

@section('title', 'Edit Data Servis')

@section('content')

<h2>Edit Data Servis</h2>
<p>Ubah informasi pengerjaan servis kendaraan.</p>

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

<form action="{{ route('data_service.update', $dataService->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>ID Servis Pelanggan</label>

        <select name="daftar_service_id" id="daftar_service_id" required>
            <option value="">-- Pilih ID Servis Pelanggan --</option>

            @foreach ($daftarServices as $service)
                <option
                    value="{{ $service->id }}"
                    data-keluhan="{{ $service->keluhan_kendaraan }}"
                    {{ old('daftar_service_id', $dataService->daftar_service_id) == $service->id ? 'selected' : '' }}
                >
                    ID: {{ $service->id }}
                    | {{ $service->pelanggan->nama_lengkap ?? '-' }}
                    | {{ $service->kendaraan->no_plat ?? '-' }}
                </option>
            @endforeach
        </select>
    </div>

    <br>

    <div class="form-group">
        <label>Keluhan Kendaraan</label>

        <textarea id="keluhan_kendaraan" readonly>{{ $dataService->daftarService->keluhan_kendaraan ?? '-' }}</textarea>
    </div>

    <br>

    <div class="form-group">
        <label for="estimasi_servis">Estimasi Servis</label>

        <input
            type="text"
            id="estimasi_servis"
            name="estimasi_servis"
            value="{{ old('estimasi_servis', $dataService->estimasi_servis) }}"
            placeholder="Contoh: 2 Jam"
            required
        >
    </div>

    <br>

    <div class="form-group">
        <label>Nama Mekanik</label>

        <input
            type="text"
            name="nama_mekanik"
            value="{{ old('nama_mekanik', $dataService->nama_mekanik) }}"
            required
        >
    </div>

    <br>

    <div class="form-group">
        <label>Sparepart Pengganti</label>

        <textarea name="sparepart_pengganti">{{ old('sparepart_pengganti', $dataService->sparepart_pengganti) }}</textarea>
    </div>

    <br>

    <button type="submit" class="btn">
        Simpan Perubahan
    </button>

    <a href="{{ route('data_service.index') }}" class="btn">
        Kembali
    </a>

</form>

<script>
    const pilihanService = document.getElementById('daftar_service_id');
    const keluhan = document.getElementById('keluhan_kendaraan');

    pilihanService.addEventListener('change', function () {
        const opsi = this.options[this.selectedIndex];
        keluhan.value = opsi.dataset.keluhan || '';
    });
</script>

@endsection
