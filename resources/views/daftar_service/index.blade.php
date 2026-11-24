@extends('layouts.app')

@section('title', 'Daftar Servis Motor')

@section('content')

<h2>Daftar Servis Motor</h2>

<a href="{{ route('daftar_service.create') }}" class="btn">
    + Tambah Daftar Servis
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
            <th>ID Servis</th>
            <th>Nomor Plat</th>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Servis</th>
            <th>Keluhan Kendaraan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($servis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    {{ $item->id }}
                </td>

                <td>
                    {{ $item->kendaraan->no_plat ?? '-' }}
                </td>

                <td>
                    {{ $item->pelanggan_id }}
                </td>

                <td>
                    {{ $item->pelanggan->nama_lengkap ?? '-' }}
                </td>

                <td>
                    {{ $item->tanggal_servis }}
                </td>

                <td>
                    {{ $item->keluhan_kendaraan }}
                </td>

                <td>
                    <a href="{{ route('daftar_service.show', $item->id) }}" class="btn">
                        Detail
                    </a>

                    <a href="{{ route('daftar_service.edit', $item->id) }}" class="btn">
                        Edit
                    </a>

                    <form action="{{ route('daftar_service.destroy', $item->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn"
                                onclick="return confirm('Yakin ingin menghapus data servis ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Belum ada data servis.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
