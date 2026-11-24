@extends('layouts.app')

@section('title', 'Tambah Pembayaran Servis')

@section('content')

<h2>Tambah Pembayaran Servis</h2>

<p>Masukkan informasi pembayaran servis kendaraan.</p>

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

<form action="{{ route('pembayaran_service.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>ID Servis Pelanggan</label>

        <select name="daftar_service_id" required>
            <option value="">-- Pilih ID Servis Pelanggan --</option>

            @foreach ($daftarServices as $service)
                <option
                    value="{{ $service->id }}"
                    {{ old('daftar_service_id') == $service->id ? 'selected' : '' }}
                >
                    ID: {{ $service->id }}
                    | Pelanggan: {{ $service->pelanggan->nama_lengkap ?? '-' }}
                    | Plat: {{ $service->kendaraan->no_plat ?? '-' }}
                </option>
            @endforeach
        </select>
    </div>

    <br>

    <div class="form-group">
        <label>Jumlah Biaya Servis (Rp)</label>

        <input
            type="number"
            name="jumlah_biaya"
            value="{{ old('jumlah_biaya') }}"
            min="0"
            step="0.01"
            placeholder="Contoh: 150000"
            required
        >
    </div>

    <br>

    <div class="form-group">
        <label>Jenis Pembayaran</label>

        <br>

        <label>
            <input
                type="radio"
                name="jenis_pembayaran"
                value="Cash / Tunai"
                {{ old('jenis_pembayaran') == 'Cash / Tunai' ? 'checked' : '' }}
            >
            Cash / Tunai
        </label>

        <br>

        <label>
            <input
                type="radio"
                name="jenis_pembayaran"
                value="Non Tunai"
                {{ old('jenis_pembayaran') == 'Non Tunai' ? 'checked' : '' }}
            >
            Non Tunai
        </label>
    </div>

    <br>

    <div class="form-group">
        <label>Keterangan</label>

        <textarea
            name="keterangan"
            placeholder="Contoh: Lunas"
        >{{ old('keterangan') }}</textarea>
    </div>

    <br>

    <button type="submit" class="btn">
        Simpan Pembayaran
    </button>

    <a href="{{ route('pembayaran_service.index') }}" class="btn">
        Kembali
    </a>
</form>

@endsection
