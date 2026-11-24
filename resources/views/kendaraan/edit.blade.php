@extends('layouts.app')

@section('title', 'Edit Data Kendaraan')

@section('content')

<h2>Edit Data Kendaraan</h2>

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

<form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nomor Plat Kendaraan</label>
        <input
            type="text"
            name="no_plat"
            value="{{ old('no_plat', $kendaraan->no_plat) }}"
            required
        >
    </div>

    <div class="form-group">
        <label>Jenis Kendaraan</label>
        <input
            type="text"
            name="jenis_kendaraan"
            value="{{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) }}"
            required
        >
    </div>

    <div class="form-group">
        <label>Nomor STNK</label>
        <input
            type="text"
            name="no_stnk"
            value="{{ old('no_stnk', $kendaraan->no_stnk) }}"
            required
        >
    </div>

    <div class="form-group">
        <label>Tahun Pembuatan</label>
        <input
            type="number"
            name="tahun_pembuatan"
            value="{{ old('tahun_pembuatan', $kendaraan->tahun_pembuatan) }}"
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
            value="{{ old('nama_pemilik', $kendaraan->nama_pemilik) }}"
            required
        >
    </div>

    <div class="form-group">
        <label>Warna Kendaraan</label>
        <input
            type="text"
            name="warna_kendaraan"
            value="{{ old('warna_kendaraan', $kendaraan->warna_kendaraan) }}"
            required
        >
    </div>

    <br>

    <button type="submit" class="btn">Update</button>
    <a href="{{ route('kendaraan.index') }}" class="btn">Kembali</a>

</form>

@endsection
