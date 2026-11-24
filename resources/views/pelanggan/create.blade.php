
@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')

    <h2>Tambah Data Pelanggan</h2>
    <p>Silakan isi informasi pelanggan dengan lengkap.</p>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <label>Nama Lengkap</label>
        <input
            type="text"
            name="nama_lengkap"
            value="{{ old('nama_lengkap') }}"
            placeholder="Masukkan nama lengkap"
            required
        >

        <label>Nomor HP</label>
        <input
            type="text"
            name="no_hp"
            value="{{ old('no_hp') }}"
            placeholder="Contoh: 081234567890"
            required
        >

        <label>Alamat Pelanggan</label>
        <textarea
            name="alamat_pelanggan"
            rows="4"
            placeholder="Masukkan alamat lengkap"
            required
        >{{ old('alamat_pelanggan') }}</textarea>

        <label>Pekerjaan</label>
        <input
            type="text"
            name="pekerjaan"
            value="{{ old('pekerjaan') }}"
            placeholder="Masukkan pekerjaan"
            required
        >

        <br>

        <button type="submit">Simpan Data</button>

        <a href="{{ route('pelanggan.index') }}" class="btn">
            Kembali
        </a>
    </form>

@endsection
