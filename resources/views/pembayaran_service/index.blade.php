@extends('layouts.app')

@section('title', 'Data Pembayaran Servis')

@section('content')

<h2>Data Pembayaran Servis</h2>

<a href="{{ route('pembayaran_service.create') }}" class="btn">
    + Tambah Pembayaran
</a>

<br><br>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pembayaran</th>
            <th>ID Servis Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Nomor Plat</th>
            <th>Jumlah Biaya</th>
            <th>Jenis Pembayaran</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($pembayaranServices as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->id }}</td>

                <td>{{ $item->daftar_service_id }}</td>

                <td>
                    {{ $item->daftarService->pelanggan->nama_lengkap ?? '-' }}
                </td>

                <td>
                    {{ $item->daftarService->kendaraan->no_plat ?? '-' }}
                </td>

                <td>
                    Rp {{ number_format($item->jumlah_biaya, 0, ',', '.') }}
                </td>

                <td>{{ $item->jenis_pembayaran ?? '-' }}</td>

                <td>{{ $item->keterangan ?? '-' }}</td>

                <td>
                    <a href="{{ route('pembayaran_service.show', $item->id) }}" class="btn">
                        Detail
                    </a>

                    <a href="{{ route('pembayaran_service.edit', $item->id) }}" class="btn">
                        Edit
                    </a>

                    <form
                        action="{{ route('pembayaran_service.destroy', $item->id) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">
                    Belum ada data pembayaran servis.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
