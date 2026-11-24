@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4">
    <h3>Selamat Datang di Aplikasi Service Motor</h3>
    <p class="text-muted">
        Sistem informasi untuk mengelola pelanggan, kendaraan,
        pendaftaran service, pekerjaan mekanik, dan pembayaran.
    </p>
</div>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card p-4">
            <h6>Total Pelanggan</h6>
            <h2 class="text-primary">{{ $totalPelanggan }}</h2>
            <a href="{{ route('pelanggan.index') }}">Lihat Data</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4">
            <h6>Total Kendaraan</h6>
            <h2 class="text-success">{{ $totalKendaraan }}</h2>
            <a href="{{ route('kendaraan.index') }}">Lihat Data</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4">
            <h6>Total Service</h6>
            <h2 class="text-warning">{{ $totalService }}</h2>
            <a href="{{ route('daftar-service.index') }}">Lihat Data</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4">
            <h6>Total Pembayaran</h6>
            <h2 class="text-danger">{{ $totalPembayaran }}</h2>
            <a href="{{ route('pembayaran-service.index') }}">Lihat Data</a>
        </div>
    </div>

</div>

@endsection
