@extends('layouts.app')

@section('title', 'Daftar Service')

@section('content')

<h2>Daftar Service Motor</h2>

<a href="{{ route('daftar_service.create') }}" class="btn">
    + Tambah Daftar Service
</a>

@if($servis->count() > 0)

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Plat</th>
            <th>Nama Pemilik</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Service</th>
            <th>Keluhan Kendaraan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($servis as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>
                {{ $item->kendaraan->no_plat ?? '-' }}
            </td>

            <td>
                {{ $item->kendaraan->nama_pemilik ?? '-' }}
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
                <a href="{{ route('daftar_service.show', $item->id) }}"
                   class="btn">
                    Detail
                </a>

                <a href="{{ route('daftar_service.edit', $item->id) }}"
                   class="btn">
                    Edit
                </a>

                <form action="{{ route('daftar_service.destroy', $item->id) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else

<p>Belum ada data daftar service.</p>

@endif

@endsection
