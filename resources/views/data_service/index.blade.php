@extends('layouts.app')

@section('title', 'Data Servis')

@section('content')

<h2>Data Servis</h2>

<a href="{{ route('data_service.create') }}" class="btn">
    + Tambah Data Servis
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
            <th>Keluhan Kendaraan</th>
            <th>Estimasi Servis</th>
            <th>Nama Mekanik</th>
            <th>Sparepart Pengganti</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($dataServices as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                {{-- ID Servis --}}
                <td>
                    {{ $item->daftar_service_id }}
                </td>

                {{-- Nomor Plat --}}
                <td>
                    {{ $item->daftarService->kendaraan->no_plat ?? '-' }}
                </td>

                {{-- Keluhan Kendaraan --}}
                <td>
                    {{ $item->daftarService->keluhan_kendaraan ?? '-' }}
                </td>

                {{-- Estimasi Servis --}}
                <td>
                    {{ $item->estimasi_servis ?? '-' }}
                </td>

                {{-- Nama Mekanik --}}
                <td>
                    {{ $item->nama_mekanik }}
                </td>

                {{-- Sparepart Pengganti --}}
                <td>
                    {{ $item->sparepart_pengganti ?? '-' }}
                </td>

                {{-- Aksi --}}
                <td>
                    <a href="{{ route('data_service.show', $item->id) }}" class="btn">
                        Detail
                    </a>

                    <a href="{{ route('data_service.edit', $item->id) }}" class="btn">
                        Edit
                    </a>

                    <form action="{{ route('data_service.destroy', $item->id) }}"
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
