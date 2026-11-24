@extends('layouts.app')

@section('title', 'Detail Data Servis')

@section('content')

<h2>Detail Data Servis</h2>

<table>
    <tr>
        <th>ID Data Servis</th>
        <td>{{ $dataService->id }}</td>
    </tr>

    <tr>
        <th>ID Daftar Servis</th>
        <td>{{ $dataService->daftar_service_id }}</td>
    </tr>

    <tr>
        <th>Nama Pelanggan</th>
        <td>{{ $dataService->daftarService->pelanggan->nama_lengkap ?? '-' }}</td>
    </tr>

    <tr>
        <th>Nomor Plat</th>
        <td>{{ $dataService->daftarService->kendaraan->no_plat ?? '-' }}</td>
    </tr>

    <tr>
        <th>Keluhan Kendaraan</th>
        <td>{{ $dataService->daftarService->keluhan_kendaraan ?? '-' }}</td>
    </tr>

    <tr>
        <th>Estimasi Servis</th>
        <td>{{ $dataService->estimasi_servis ?? '-' }}</td>
    </tr>

    <tr>
        <th>Nama Mekanik</th>
        <td>{{ $dataService->nama_mekanik ?? '-' }}</td>
    </tr>

    <tr>
        <th>Sparepart Pengganti</th>
        <td>{{ $dataService->sparepart_pengganti ?? '-' }}</td>
    </tr>

    <tr>
        <th>Tanggal Dibuat</th>
        <td>{{ $dataService->created_at ?? '-' }}</td>
    </tr>
</table>

<br>

<a href="{{ route('data_service.index') }}" class="btn">
    Kembali
</a>

<a href="{{ route('data_service.edit', $dataService->id) }}" class="btn">
    Edit
</a>

@endsection
