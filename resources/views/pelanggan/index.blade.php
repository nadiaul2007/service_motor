
@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')

    <h2>Data Pelanggan</h2>
    <p>Kelola informasi pelanggan bengkel service motor.</p>

    <a href="{{ route('pelanggan.create') }}" class="btn">
        + Tambah Pelanggan
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelanggan->nama_lengkap }}</td>
                    <td>{{ $pelanggan->no_hp }}</td>
                    <td>{{ $pelanggan->alamat_pelanggan }}</td>
                    <td>{{ $pelanggan->pekerjaan }}</td>

                    <td>
                        <a href="{{ route('pelanggan.show', $pelanggan->id) }}"
                           class="btn">Detail</a>

                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                           class="btn">Edit</a>

                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">
                        Belum ada data pelanggan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
