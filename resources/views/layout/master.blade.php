<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Toko Makmur - Pengelolaan Data</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background: #585858; width:100%;">
  <div class="container-fluid">
     <button type="button" id="hamburger"
                class="btn text-black fs-4 p-0 border-0"
                aria-expanded="true">✕</button>
    <a class="navbar-brand text-white" href="#">TOKO MAKMUR</a>
  </div>
</nav>
  <div class="d-flex min-vh-100">
<div id="sidebar" class="sidebar text-white p-3 min-vh-100"
     style="width: 250px;">

    <ul class="nav nav-pills flex-column gap-2">
        <li class="nav-item">
            <a href="/" class="nav-link {{ request()->is('/') ? 'text-white active' : 'text-black' }}">
               <i data-lucide="home"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="/data" class="nav-link {{ request()->is('data') ? 'text-white active' : 'text-black' }}">
                <i data-lucide="database"></i>Data Barang
            </a>
        </li>

        <li class="nav-item">
            <a href="/tambah" class="nav-link {{ request()->is('tambah') ? 'text-white active' : 'text-black' }}">
                <i data-lucide="package-plus"></i>Tambah Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->is('kategori') ? 'text-white active' : 'text-black' }}">
                <i data-lucide="tags"></i>Kelola Kategori
            </a>
        </li>
    </ul>
</div>

    <!-- Konten -->
    <main class="flex-grow-1 p-4">
        @yield('konten')
    </main>

</div>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>