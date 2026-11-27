# CRUD Barang - Toko Makmur

Aplikasi web sederhana berbasis Laravel untuk mengelola inventaris barang pada Toko Makmur.

## Fitur

### 1. Manajemen Data Barang & Kategori
- Menambahkan data barang dan kategori.
- Menampilkan seluruh data barang dan kategori.
- Melihat detail barang.
- Mengubah data barang dan kategori.
- Menghapus data barang dan kategori.
- Mengunggah dan mengelola gambar barang.

### 2. Pencarian Barang
- Mencari barang berdasarkan nama barang.
- Penambahan filter per kategori
- Penambahan filter data terbaru atau terlama

### 3. Dashboard
Dashboard menyediakan ringkasan informasi inventaris, meliputi:
- **Total Jenis Barang:** Jumlah seluruh jenis barang yang terdaftar.
- **Total Stok:** Jumlah keseluruhan stok dari semua jenis barang.
- **Barang Stok Menipis:** Jumlah jenis barang dengan stok kurang dari 10.
- **Total Aset:** Nilai keseluruhan inventaris berdasarkan hasil perkalian harga satuan dengan jumlah stok setiap barang.

### 4. Monitoring Stok
- Menampilkan daftar barang dengan stok kurang dari 10.
- Menyediakan tombol untuk memperbarui stok secara langsung pada setiap barang.

### 5. Barang Terakhir Diupdate
- Menampilkan informasi barang yang terakhir diperbarui berdasarkan waktu perubahan data.

## Teknologi
- PHP
- Laravel
- MySQL
