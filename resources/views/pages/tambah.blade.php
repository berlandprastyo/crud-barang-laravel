@extends('layout.master')
@section('konten')
<div class="form-container">
    <div class="form-header">
        <h4>Tambah Barang</h4>
        <p>Masukkan Data</p>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang"
                class="form-control" placeholder="Masukkan nama barang" value="{{ old('nama_barang') }}">
                @error('nama_barang')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="nama_barang" class="form-label">Kategori Barang</label>
                <select class="form-select" name="kategori" aria-label="Default select example">
                <option selected value="">Kategori</option>
                @foreach ($kategori as $item )
                <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
            @error('kategori')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlah_barang" id="jumlah_barang"
                    class="form-control" placeholder="Masukkan jumlah" value="{{ old('jumlah_barang') }}">
            @error('jumlah_barang')
                    <div class="form-text text-danger">{{$message}}</div>
            @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="number" name="harga_satuan" id="harga_satuan"
                    class="form-control" placeholder="Masukkan harga" value="{{ old('harga_satuan') }}">
            @error('harga_satuan')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"
                rows="5" placeholder="Deskripsi barang">{{old('deskripsi')}}</textarea>
            @error('deskripsi')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gambar" class="form-label">Gambar Barang</label>
            <input type="file" name="gambar" id="gambar"
                class="form-control" >
            <small class="text-muted">Format JPG, JPEG, PNG, atau WEBP Maksimal 2MB.</small>
             @error('gambar')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="/data" class="btn btn-light border">
                Batal
            </a>
            <button type="submit" class="btn btn-primary">
                Simpan Barang
            </button>
        </div>
    </form>
@endsection