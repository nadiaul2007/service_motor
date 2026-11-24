@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')

    <h2>Detail Data Pelanggan</h2>
    <p>Informasi lengkap pelanggan bengkel service motor.</p>

    <table>
        <tr>
            <th width="30%">ID Pelanggan</th>
            <td>{{ $pelanggan->id }}</td>
        </tr>

        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $pelanggan->nama_lengkap }}</td>
        </tr>

        <tr>
            <th>Nomor HP</th>
            <td>{{ $pelanggan->no_hp }}</td>
        </tr>

        <tr>
            <th>Alamat Pelanggan</th>
            <td>{{ $pelanggan->alamat_pelanggan }}</td>
        </tr>

        <tr>
            <th>Pekerjaan</th>
            <td>{{ $pelanggan->pekerjaan }}</td>
        </tr>
    </table>

    <br>

    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn">
        Edit Data
    </a>

    <a href="{{ route('pelanggan.index') }}" class="btn">
        Kembali
    </a>

@endsection
