@extends('layout.master')
@section('konten')
<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold">Dashboard</h3>
        <p class="text-secondary mb-0">
            Selamat datang! Berikut ringkasan inventaris anda.
        </p>
    </div>

    {{-- Summary Cards --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-secondary">Total Barang</span>
                        <i data-lucide="package" class="text-primary"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $total }}</h3>
                    <small class="text-secondary">Jenis barang terdaftar</small>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-secondary">Total Stok</span>
                        <i data-lucide="boxes" class="text-success"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $jumlah }}</h3>
                    <small class="text-secondary">Unit barang tersedia</small>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-secondary">Stok Menipis</span>
                        <i data-lucide="alert-triangle" class="text-warning"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $stokTipis->count() }}</h3>
                    <small class="text-secondary">Barang perlu diperhatikan</small>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-secondary">Total Nilai Aset</span>
                        <i data-lucide="wallet" class="text-info"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ number_format($totalAset ?? 0, 2, ',', '.') }}</h3>
                    <small class="text-secondary">Nilai inventaris</small>
                </div>
            </div>
        </div>

    </div>

    {{-- Tables --}}
    <div class="row g-3">

        {{-- Stok Menipis --}}
        <div class="col-12 col-xl-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Stok Menipis</h5>
                        @if ($stokTipis->count() > 5)    
                        <a href="#" class="text-decoration-none small">Lihat semua</a>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stokTipis as $item )     
                                <tr>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{$item->jumlah_barang}}</td>
                                    @if ( $item->jumlah_barang <= 5)
                                    <td><span class="badge text-bg-danger">Kritis</span></td>
                                    @elseif ( $item->jumlah_barang <= 10)
                                    <td><span class="badge text-bg-warning">Menipis</span></td>
                                    @endif
                                    <td><a href="/{{$item->id}}/edit" class="btn btn-outline-danger">
                                        Update</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Barang Terbaru --}}
        <div class="col-12 col-xl-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Barang Terbaru</h5>
                        <a href="/data" class="text-decoration-none small">Lihat semua</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($terbaru as $item)
                                <tr>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->jumlah_barang }}</td>
                                    <td>{{ $item->harga_satuan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Quick Action --}}
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <h5 class="fw-bold mb-1">Kelola Inventaris</h5>
                <p class="text-secondary mb-0 small">
                    Tambahkan barang baru atau periksa seluruh data inventaris.
                </p>
            </div>

            <div class="d-flex gap-2">
                <a href="/tambah" class="btn btn-primary">
                    <i data-lucide="plus" class="me-1" style="width:16px"></i>
                    Tambah Barang
                </a>
                <a href="/data" class="btn btn-outline-secondary">
                    Lihat Barang
                </a>
            </div>
        </div>
    </div>

</div>
@endsection