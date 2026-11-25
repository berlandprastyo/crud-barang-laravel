<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index () {
        $total = Barang::count();
        $jumlah = Barang::sum('jumlah_barang');
        $stokTipis = Barang::where('jumlah_barang' ,'<=', 10)->orderBy('jumlah_barang','asc')->limit(6)->get();
        $terbaru = Barang::orderBy('updated_at','desc')->limit(6)->get();
        $totalAset = Barang::selectRaw('sum(harga_satuan * jumlah_barang) as totalAset')->value('totalAset');
        return view('pages.dashboard',compact('total','jumlah','stokTipis','terbaru','totalAset'));


    }
    public function data (Request $request) {
        $nama = $request->query('nama');
        $data = Barang::when($nama,function($query, $nama){
            $query->where('nama_barang','LIKE',"%$nama%");
        })->orderBy('updated_at','desc')->get();
        return view('pages.dataBarang',[
            'data'=>$data,
            'nama'=>$nama
        ]);
    }
    public function tambah () {
        return view('pages.tambah');
    }
    public function store (Request $request) {
        $request->validate([
        'nama_barang' => ['required','string','min:1'],
        'jumlah_barang' => ['required','integer','min:1'],
        'harga_satuan' => ['required','integer','min:100'],
        'deskripsi' => ['required','string','min:1'],
        'gambar' => ['nullable','image', 'mimes:jpeg,jpg,png,webp', 'max:2000']
        ],[
            'nama_barang.required' => 'Kolom Nama Barang Wajib Diisi!',
            'nama_barang.string' => 'Kolom Nama Barang Wajib Berupa Teks!',
            'nama_barang.min' => 'Kolom Nama Barang Minimal 1 Huruf!',
            'jumlah_barang.required' => 'Kolom Jumlah Barang Wajib Diisi!',
            'jumlah_barang.integer' => 'Kolom Jumlah Barang Wajib Berupa Angka!',
            'jumlah_barang.min' => 'Kolom Jumlah Barang Minimal Berjumlah 1!',
            'harga_satuan.required' => 'Kolom Harga Satuan Wajib Diisi!',
            'harga_satuan.integer' => 'Kolom Harga Satuan Wajib Berupa Angka!',
            'harga_satuan.min' => 'Kolom Harga Minimal Berjumlah 100!',
            'deskripsi.required' => 'Kolom Deskripsi Wajib Diisi!',
            'deskripsi.string' => 'Kolom Deskripsi Wajib Berupa Teks!',
            'deskripsi.min' => 'Kolom Deskripsi Minimal 1 Huruf!',
            'gambar.image' => 'File harus berupa gambar!',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP!',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB!'
        ]);
        $path = "gambar/kosong.svg";
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('gambar','public');
        }
        Barang::create([
        'nama_barang'=> $request->nama_barang,
        'jumlah_barang'=>$request->jumlah_barang,
        'deskripsi'=>$request->deskripsi,
        'harga_satuan'=>$request->harga_satuan,
        'image'=>$path
        ]);
        return redirect('/data')->with('success','Barang Berhasil Ditambahkan!');
    }
    public function detail ($id) {
        $data = Barang::findorFail($id);
        return view('pages.detail',compact('data'));
    }
    public function edit ($id) {
        $data = Barang::findorFail($id);
        return view('pages.edit',compact('data'));
    }
    public function update ($id,Request $request) {
     $data = Barang::findorFail($id);
        $request->validate([
            'nama_barang' => ['required','string','min:1'],
            'jumlah_barang' => ['required','integer','min:1'],
            'harga_satuan' => ['required','integer','min:100'],
            'deskripsi' => ['required','string','min:1'],
            'gambar' => ['nullable','image', 'mimes:jpeg,jpg,png,webp', 'max:2000']
            ],[
                'nama_barang.required' => 'Kolom Nama Barang Wajib Diisi!',
                'nama_barang.string' => 'Kolom Nama Barang Wajib Berupa Teks!',
                'nama_barang.min' => 'Kolom Nama Barang Minimal 1 Huruf!',
            'jumlah_barang.required' => 'Kolom Jumlah Barang Wajib Diisi!',
            'jumlah_barang.integer' => 'Kolom Jumlah Barang Wajib Berupa Angka!',
            'jumlah_barang.min' => 'Kolom Jumlah Barang Minimal Berjumlah 1!',
            'harga_satuan.required' => 'Kolom Harga Satuan Wajib Diisi!',
            'harga_satuan.integer' => 'Kolom Harga Satuan Wajib Berupa Angka!',
            'harga_satuan.min' => 'Kolom Harga Minimal Berjumlah 100!',
            'deskripsi.required' => 'Kolom Deskripsi Wajib Diisi!',
            'deskripsi.string' => 'Kolom Deskripsi Wajib Berupa Teks!',
            'deskripsi.min' => 'Kolom Deskripsi Minimal 1 Huruf!',
            'gambar.image' => 'File harus berupa gambar!',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP!',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB!'
            ]);
            $path = $data->image;
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('gambar','public');
                if ($data->image != 'gambar/kosong.svg') {
                    Storage::disk('public')->delete($data->image);
                }
            }
                    $data->update([
                        'nama_barang'=> $request->nama_barang,
                        'jumlah_barang'=>$request->jumlah_barang,
                        'deskripsi'=>$request->deskripsi,
                        'harga_satuan'=>$request->harga_satuan,
                        'image'=>$path
                        ]);
                        
                        return redirect('/data')->with('success','Barang Berhasil Diupdate!');
         }
         public function delete($id) {
            $data = Barang::findorFail($id);
            if ($data->image != 'gambar/kosong.svg') {
                Storage::disk('public')->delete($data->image);
            }
            $data->delete();
            return redirect('/data')->with('success','Barang Berhasil Dihapus!');
         }
         public function deleteImg ($id) {
            $data = Barang::findorFail($id);
            if ($data->image != 'gambar/kosong.svg') {
                Storage::disk('public')->delete($data->image);
                $data->update([
                    'image'=> 'gambar/kosong.svg'
                ]);
            }
            return back()->with('success','Berhasil Menghapus Gambar!');
         }
                        
}
                        