<?php

namespace Database\Seeders;
use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
        'nama_barang'=>'Samsung Smart TV 32',
        'jumlah_barang'=>1,
        'deskripsi'=>'TV 32 inch',
        'image'=>'gambar/kosong.svg',
        'kategori_id'=>1,
        'harga_satuan'=>3000000
        ]);
    }
}
