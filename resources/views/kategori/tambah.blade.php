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
        <h4>Tambah Kategori</h4>
        <p>Masukkan Data Kategori</p>
    </div>
         <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori"
                class="form-control" placeholder="Masukkan nama kategori" value="{{ old('nama_kategori') }}">
                @error('nama_kategori')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
             <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('kategori.index') }}" class="btn btn-light border">
                Batal
            </a>
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>
        </form>
</div>
@endsection
