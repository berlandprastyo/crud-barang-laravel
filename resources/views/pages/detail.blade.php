@extends('layout.master')
@section('konten')
<div class="container py-5">
    <div class="card border-0 shadow-sm rounded-4 p-4">

        <!-- Gambar Barang -->
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $data->image) }}"
                 class="img-fluid rounded-3"
                 style="width: 100%; max-width: 500px; height: 350px; object-fit: contain;"
                 alt="{{ $data->nama_barang }}">
        </div>

        <!-- Detail Barang -->
        <div class="mx-auto w-100" style="max-width: 800px;">
            <h3 class="fw-bold">{{ $data->nama_barang }}</h3>

            <hr>

           

            <div class="row">
                <div class="col-md-6 mb-3">
                <small class="text-secondary">Deskripsi</small>
                <p>{{ $data->deskripsi }}</p>
            </div>

                <div class="col-md-6 mb-3">
                    <small class="text-secondary">Update Terakhir</small>
                    <h5>{{$data->updated_at->format('d-m-Y H:i:s')}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <small class="text-secondary">Jumlah Barang</small>
                    <h5>{{ $data->jumlah_barang }}</h5>
                </div>

                <div class="col-md-6 mb-3">
                    <small class="text-secondary">Harga Satuan</small>
                    <h5>Rp {{ number_format($data->harga_satuan, 2, '.', ',') }}</h5>
                </div>
            </div>

            <a href="/data" class="btn btn-secondary mt-3">
                Kembali
            </a>
        </div>

    </div>
</div>
@endsection