@extends('layouts.app')

@section('title', 'Detail Daftar Service')

@section('content')

<h2>Detail Daftar Service</h2>

<table>
    <tr>
        <th>Nomor Plat</th>
        <td>{{ $servis->kendaraan->no_plat ?? '-' }}</td>
    </tr>

    <tr>
        <th>Nama Pemilik Kendaraan</th>
        <td>{{ $servis->kendaraan->nama_pemilik ?? '-' }}</td>
    </tr>

    <tr>
        <th>Nama Pelanggan</th>
        <td>{{ $servis->pelanggan->nama_lengkap ?? '-' }}</td>
    </tr>

    <tr>
        <th>Nomor HP Pelanggan</th>
        <td>{{ $servis->pelanggan->no_hp ?? '-' }}</td>
    </tr>

    <tr>
        <th>Tanggal Service</th>
        <td>{{ $servis->tanggal_servis }}</td>
    </tr>

    <tr>
        <th>Keluhan Kendaraan</th>
        <td>{{ $servis->keluhan_kendaraan }}</td>
    </tr>
</table>

<br>

<a href="{{ route('daftar_service.index') }}" class="btn">
    Kembali
</a>

<a href="{{ route('daftar_service.edit', $servis->id) }}" class="btn">
    Edit Data
</a>

@endsection
