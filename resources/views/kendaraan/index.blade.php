@extends('layouts.app')

@section('title', 'Data Kendaraan')

@section('content')

<h2>Data Kendaraan</h2>

<a href="{{ route('kendaraan.create') }}" class="btn">
    + Tambah Kendaraan
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Plat</th>
            <th>Jenis Kendaraan</th>
            <th>No STNK</th>
            <th>Tahun Pembuatan</th>
            <th>Nama Pemilik</th>
            <th>Warna Kendaraan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($kendaraans as $kendaraan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kendaraan->no_plat }}</td>
                <td>{{ $kendaraan->jenis_kendaraan }}</td>
                <td>{{ $kendaraan->no_stnk }}</td>
                <td>{{ $kendaraan->tahun_pembuatan }}</td>
                <td>{{ $kendaraan->nama_pemilik }}</td>
                <td>{{ $kendaraan->warna_kendaraan }}</td>

                <td>
                    <a href="{{ route('kendaraan.show', $kendaraan->id) }}" class="btn">
                        Detail
                    </a>

                    <a href="{{ route('kendaraan.edit', $kendaraan->id) }}" class="btn">
                        Edit
                    </a>

                    <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn"
                                onclick="return confirm('Yakin ingin menghapus data kendaraan ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Belum ada data kendaraan.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
