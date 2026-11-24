
@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')

    <h2>Edit Data Pelanggan</h2>
    <p>Perbarui informasi pelanggan di bawah ini.</p>

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Lengkap</label>
        <input
            type="text"
            name="nama_lengkap"
            value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}"
            required
        >

        <label>Nomor HP</label>
        <input
            type="text"
            name="no_hp"
            value="{{ old('no_hp', $pelanggan->no_hp) }}"
            required
        >

        <label>Alamat Pelanggan</label>
        <textarea
            name="alamat_pelanggan"
            rows="4"
            required
        >{{ old('alamat_pelanggan', $pelanggan->alamat_pelanggan) }}</textarea>

        <label>Pekerjaan</label>
        <input
            type="text"
            name="pekerjaan"
            value="{{ old('pekerjaan', $pelanggan->pekerjaan) }}"
            required
        >

        <br>

        <button type="submit">Simpan Perubahan</button>

        <a href="{{ route('pelanggan.index') }}" class="btn">
            Kembali
        </a>
    </form>

@endsection
