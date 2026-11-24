@extends('layouts.app')

@section('title', 'Edit Daftar Servis')

@section('content')

<h2>Edit Daftar Servis</h2>

<p>Perbarui informasi pendaftaran servis kendaraan.</p>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('daftar_service.update', $servis->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>ID Servis Pelanggan</label>
    <input type="text" value="{{ $servis->id }}" readonly>

    <br><br>

    <label>Nomor Plat Kendaraan</label>
    <select name="kendaraan_id" required>
        <option value="">-- Pilih Kendaraan --</option>

        @foreach($kendaraans as $kendaraan)
            <option
                value="{{ $kendaraan->id }}"
                {{ old('kendaraan_id', $servis->kendaraan_id) == $kendaraan->id ? 'selected' : '' }}
            >
                {{ $kendaraan->no_plat }} - {{ $kendaraan->nama_pemilik }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>ID Pelanggan</label>
    <select name="pelanggan_id" id="pelanggan_id" required>
        <option value="">-- Pilih Pelanggan --</option>

        @foreach($pelanggans as $pelanggan)
            <option
                value="{{ $pelanggan->id }}"
                data-nama="{{ $pelanggan->nama_lengkap }}"
                {{ old('pelanggan_id', $servis->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}
            >
                {{ $pelanggan->id }} - {{ $pelanggan->nama_lengkap }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Nama Pelanggan</label>
    <input
        type="text"
        id="nama_pelanggan"
        readonly
        placeholder="Nama pelanggan otomatis"
    >

    <br><br>

    <label>Keluhan Kendaraan</label>
    <textarea name="keluhan_kendaraan" rows="4" required>{{ old('keluhan_kendaraan', $servis->keluhan_kendaraan) }}</textarea>

    <br><br>

    <label>Tanggal Servis</label>
    <input
        type="date"
        name="tanggal_servis"
        value="{{ old('tanggal_servis', $servis->tanggal_servis) }}"
        required
    >

    <br><br>

    <button type="submit">Simpan Perubahan</button>

    <a href="{{ route('daftar_service.index') }}" class="btn">
        Kembali
    </a>
</form>

<script>
    const pelangganSelect = document.getElementById('pelanggan_id');
    const namaPelanggan = document.getElementById('nama_pelanggan');

    function tampilkanNamaPelanggan() {
        const pilihan = pelangganSelect.options[pelangganSelect.selectedIndex];

        namaPelanggan.value = pilihan.dataset.nama || '';
    }

    pelangganSelect.addEventListener('change', tampilkanNamaPelanggan);

    tampilkanNamaPelanggan();
</script>

@endsection
