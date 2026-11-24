@extends('layouts.app')

@section('title', 'Detail Data Kendaraan')

@section('content')

<h2>Detail Data Kendaraan</h2>

<table>
    <tr>
        <th>Nomor Plat</th>
        <td>{{ $kendaraan->no_plat }}</td>
    </tr>

    <tr>
        <th>Jenis Kendaraan</th>
        <td>{{ $kendaraan->jenis_kendaraan }}</td>
    </tr>

    <tr>
        <th>Nomor STNK</th>
        <td>{{ $kendaraan->no_stnk }}</td>
    </tr>

    <tr>
        <th>Tahun Pembuatan</th>
        <td>{{ $kendaraan->tahun_pembuatan }}</td>
    </tr>

    <tr>
        <th>Nama Pemilik</th>
        <td>{{ $kendaraan->nama_pemilik }}</td>
    </tr>

    <tr>
        <th>Warna Kendaraan</th>
        <td>{{ $kendaraan->warna_kendaraan }}</td>
    </tr>
</table>

<br>

<a href="{{ route('kendaraan.index') }}" class="btn">
    Kembali
</a>

<a href="{{ route('kendaraan.edit', $kendaraan->id) }}" class="btn">
    Edit Kendaraan
</a>

@endsection
