@extends('layouts.app')

@section('title', 'Detail Daftar Servis')

@section('content')

<h2>Detail Daftar Servis</h2>

<p>Informasi lengkap pendaftaran servis kendaraan pelanggan.</p>

<table>
    <tr>
        <th width="30%">ID Servis Pelanggan</th>
        <td>{{ $servis->id }}</td>
    </tr>

    <tr>
        <th>Nomor Plat Kendaraan</th>
        <td>{{ $servis->kendaraan->no_plat ?? '-' }}</td>
    </tr>

    <tr>
        <th>Jenis Kendaraan</th>
        <td>{{ $servis->kendaraan->jenis_kendaraan ?? '-' }}</td>
    </tr>

    <tr>
        <th>ID Pelanggan</th>
        <td>{{ $servis->pelanggan_id }}</td>
    </tr>

    <tr>
        <th>Nama Pelanggan</th>
        <td>{{ $servis->pelanggan->nama_lengkap ?? '-' }}</td>
    </tr>

    <tr>
        <th>Keluhan Kendaraan</th>
        <td>{{ $servis->keluhan_kendaraan }}</td>
    </tr>

    <tr>
        <th>Tanggal Servis</th>
        <td>{{ $servis->tanggal_servis }}</td>
    </tr>
</table>

<br>

<a href="{{ route('daftar_service.edit', $servis->id) }}" class="btn">
    Edit Data
</a>

<a href="{{ route('daftar_service.index') }}" class="btn">
    Kembali
</a>

@endsection
