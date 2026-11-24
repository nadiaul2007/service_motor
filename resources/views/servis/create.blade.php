@extends('layouts.app')

@section('title', 'Tambah Daftar Service')

@section('content')

<h2>Tambah Daftar Service</h2>

<form action="{{ route('daftar_service.store') }}" method="POST">
    @csrf

    <label>Nomor Plat Kendaraan</label>
    <select name="kendaraan_id" required>
        <option value="">-- Pilih Kendaraan --</option>

        @foreach($kendaraans as $kendaraan)
            <option value="{{ $kendaraan->id }}"
                {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                {{ $kendaraan->no_plat }} - {{ $kendaraan->nama_pemilik }}
            </option>
        @endforeach
    </select>

    <label>Nama Pelanggan</label>
    <select name="pelanggan_id" required>
        <option value="">-- Pilih Pelanggan --</option>

        @foreach($pelanggans as $pelanggan)
            <option value="{{ $pelanggan->id }}"
                {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                {{ $pelanggan->nama_lengkap }}
            </option>
        @endforeach
    </select>

    <label>Tanggal Service</label>
    <input
        type="date"
        name="tanggal_servis"
        value="{{ old('tanggal_servis') }}"
        required
    >

    <label>Keluhan Kendaraan</label>
    <textarea
        name="keluhan_kendaraan"
        rows="4"
        required
    >{{ old('keluhan_kendaraan') }}</textarea>

    <button type="submit">Simpan</button>

    <a href="{{ route('daftar_service.index') }}" class="btn">
        Kembali
    </a>
</form>

@endsection
