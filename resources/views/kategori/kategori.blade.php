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
    <a class="navbar-brand" href="#">Data Kategori</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form class="d-flex gap-2 w-70" method="GET" action="">
    <input class="form-control flex-grow-1" type="search" placeholder="Cari nama barang..." name="nama"
    value="{{ request('nama') }}" >
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
      <th scope="col">Id Kategori</th>
      <th scope="col">Nama Kategori</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($kategori as $item )
  <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$item->id_kategori}}</td>
      <td>{{$item->nama_kategori}}</td>
      <td>
         <div class="d-flex gap-2">
          <form action="{{ route('kategori.edit',$item->id_kategori) }}">
            @csrf
            <button type="submit" class="btn btn-warning">Update</button>
          </form>
          <form action="{{route('kategori.destroy',$item->id_kategori)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusData{{ $item->id_kategori }}">
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="hapusData{{ $item->id_kategori }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Apa Anda Yakin Ingin Menghapus Kategori {{ $item->nama_kategori }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-outline-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
          </form>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
<div class="d-flex justify-content-end mt-4">
  <form action="{{ route('kategori.create') }}" method="GET">
     <button type="submit" class="btn btn-primary">Tambah Data</button>
  </form>
</div>
@endsection
