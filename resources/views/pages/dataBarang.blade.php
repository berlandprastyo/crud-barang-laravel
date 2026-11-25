@extends('layout.master')
@section('konten')
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<nav class="navbar navbar-expand-lg mb-0 bg-light" style="backdrop-filter: blur(15px);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Data Barang</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <form class="d-flex" method="GET" action="">
        {{-- <div class="btn-group">
          <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           Small button
          </button>
      <ul class="dropdown-menu">
    ...
       </ul>
            </div> --}}
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nama" value="{{ $nama }}">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="border overflow-auto">
<table class="table table-striped mb-0">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga Satuan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item )   
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$item->nama_barang}}</td>
      <td>{{$item->jumlah_barang}}</td>
      <td>{{number_format($item->harga_satuan,2,',','.')}}</td>
      <td>
        <div class="d-flex gap-2">
          <form action="/{{ $item->id }}/edit">
            @csrf
            <button type="submit" class="btn btn-warning">Update</button>
          </form>
          <form action="/{{ $item->id }}/delete" method="POST">
            @csrf
            @method('DELETE')
           <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusData">
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="hapusData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Apa Anda Yakin Ingin Menghapus {{ $item->nama_barang }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-outline-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
          </form>
          <form action="/{{ $item->id }}/detail">
            <button type="submit" class="btn btn-primary">Detail</button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<div class="d-flex justify-content-end mt-4">
  <form action="/tambah" method="GET">
     <button type="submit" class="btn btn-primary">Tambah Data</button>
  </form>
</div>

@endsection