@extends('layout.master')

@section('konten')
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<div class="form-container">
    <div class="form-header">
        <h4>Update Barang</h4>
        <p>Perbarui Data Barang</p>
    </div>

   

        {{-- Preview Gambar --}}
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $data->image) }}"
                class="img-fluid rounded-3 border"
                style="width: 100%; max-width: 500px; height: 300px; object-fit: contain;"
                alt="{{ $data->nama_barang }}"
                >
        </div>

        {{-- Upload / Hapus Gambar --}}
        @if ($data->image != 'gambar/kosong.svg')
        <div class="mt-2 d-flex justify-content-end">
            <form action="/{{$data->id}}/deleteimg" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    Hapus Gambar
                </button>
            </form>
        </div>
        @endif
         <form action="" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="gambar" class="form-label">Ganti Gambar</label>
            <input type="file" name="gambar" id="gambar"
                class="form-control">

            <small class="text-muted">
                Format JPG, JPEG, PNG, atau WEBP. Maksimal 2MB.
            </small>

            @error('gambar')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror

        </div>

        {{-- Nama Barang --}}
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang"
                class="form-control"
                placeholder="Masukkan nama barang"
                value="{{ old('nama_barang', $data->nama_barang) }}">

            @error('nama_barang')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jumlah dan Harga --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlah_barang" id="jumlah_barang"
                    class="form-control"
                    placeholder="Masukkan jumlah"
                    value="{{ old('jumlah_barang', $data->jumlah_barang) }}">

                @error('jumlah_barang')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="number" name="harga_satuan" id="harga_satuan"
                    class="form-control"
                    placeholder="Masukkan harga"
                    value="{{ old('harga_satuan', $data->harga_satuan) }}">

                @error('harga_satuan')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"
                class="form-control" rows="5"
                placeholder="Deskripsi barang">{{ old('deskripsi', $data->deskripsi) }}</textarea>

            @error('deskripsi')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-end gap-2">
            <a href="/data" class="btn btn-light border">
                Batal
            </a>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
