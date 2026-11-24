@extends('layouts.app')

@section('title', 'Tambah Data Kendaraan')

@section('content')

<h2>Tambah Data Kendaraan</h2>

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

<form action="{{ route('kendaraan.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nomor Plat Kendaraan</label>
        <input
            type="text"
            name="no_plat"
            value="{{ old('no_plat') }}"
            placeholder="Contoh: BL 1234 AA"
            required
        >
    </div>

    <div class="form-group">
        <label>Jenis Kendaraan</label>
        <input
            type="text"
            name="jenis_kendaraan"
            value="{{ old('jenis_kendaraan') }}"
            placeholder="Contoh: Matic"
            required
        >
    </div>

    <div class="form-group">
        <label>Nomor STNK</label>
        <input
            type="text"
            name="no_stnk"
            value="{{ old('no_stnk') }}"
            placeholder="Masukkan nomor STNK"
            required
        >
    </div>

    <div class="form-group">
        <label>Tahun Pembuatan</label>
        <input
            type="number"
            name="tahun_pembuatan"
            value="{{ old('tahun_pembuatan') }}"
            placeholder="Contoh: 2020"
            min="1900"
            max="{{ date('Y') }}"
            required
        >
    </div>

    <div class="form-group">
        <label>Nama Pemilik</label>
        <input
            type="text"
            name="nama_pemilik"
            value="{{ old('nama_pemilik') }}"
            placeholder="Masukkan nama pemilik"
            required
        >
    </div>

    <div class="form-group">
        <label>Warna Kendaraan</label>
        <input
            type="text"
            name="warna_kendaraan"
            value="{{ old('warna_kendaraan') }}"
            placeholder="Contoh: Hitam"
            required
        >
    </div>

    <br>

    <button type="submit" class="btn">Simpan</button>
    <a href="{{ route('kendaraan.index') }}" class="btn">Kembali</a>

</form>

@endsection
