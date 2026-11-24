@extends('layouts.app')

@section('title', 'Detail Pembayaran Servis')

@section('content')

<h2>Detail Pembayaran Servis</h2>

<table>
    <tr>
        <th>ID Pembayaran</th>
        <td>{{ $pembayaranService->id }}</td>
    </tr>

    <tr>
        <th>ID Servis Pelanggan</th>
        <td>{{ $pembayaranService->daftar_service_id }}</td>
    </tr>

    <tr>
        <th>Nama Pelanggan</th>
        <td>
            {{ $pembayaranService->daftarService->pelanggan->nama_lengkap ?? '-' }}
        </td>
    </tr>

    <tr>
        <th>Nomor Plat</th>
        <td>
            {{ $pembayaranService->daftarService->kendaraan->no_plat ?? '-' }}
        </td>
    </tr>

    <tr>
        <th>Keluhan Kendaraan</th>
        <td>
            {{ $pembayaranService->daftarService->keluhan_kendaraan ?? '-' }}
        </td>
    </tr>

    <tr>
        <th>Jumlah Biaya</th>
        <td>
            Rp {{ number_format($pembayaranService->jumlah_biaya, 0, ',', '.') }}
        </td>
    </tr>

    <tr>
        <th>Jenis Pembayaran</th>
        <td>{{ $pembayaranService->jenis_pembayaran ?? '-' }}</td>
    </tr>

    <tr>
        <th>Keterangan</th>
        <td>{{ $pembayaranService->keterangan ?? '-' }}</td>
    </tr>

    <tr>
        <th>Tanggal Pembayaran</th>
        <td>{{ $pembayaranService->created_at ?? '-' }}</td>
    </tr>
</table>

<br>

<a href="{{ route('pembayaran_service.index') }}" class="btn">
    Kembali
</a>

<a href="{{ route('pembayaran_service.edit', $pembayaranService->id) }}" class="btn">
    Edit
</a>

@endsection
