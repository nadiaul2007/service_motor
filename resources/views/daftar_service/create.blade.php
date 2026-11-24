@extends('layouts.app')

@section('title', 'Tambah Daftar Servis')

@section('content')

<h2>Tambah Daftar Servis</h2>

@if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('daftar_service.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nomor Plat Kendaraan</label>
        <select name="kendaraan_id" required>
            <option value="">-- Pilih Nomor Plat --</option>

            @foreach ($kendaraans as $kendaraan)
                <option value="{{ $kendaraan->id }}"
                    {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                    {{ $kendaraan->no_plat }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>ID Pelanggan</label>
        <select name="pelanggan_id" required>
            <option value="">-- Pilih ID Pelanggan --</option>

            @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}"
                    {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                    {{ $pelanggan->id }} - {{ $pelanggan->nama_lengkap }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Keluhan Kendaraan</label>
        <textarea
            name="keluhan_kendaraan"
            placeholder="Contoh: Mesin sulit dinyalakan"
            required
        >{{ old('keluhan_kendaraan') }}</textarea>
    </div>

    <div class="form-group">
        <label>Tanggal Servis</label>
        <input
            type="date"
            name="tanggal_servis"
            value="{{ old('tanggal_servis') }}"
            required
        >
    </div>

    <br>

    <button type="submit" class="btn">Simpan</button>
    <a href="{{ route('daftar_service.index') }}" class="btn">Kembali</a>

</form>

@endsection
