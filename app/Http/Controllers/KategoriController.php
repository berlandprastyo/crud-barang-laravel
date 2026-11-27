<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::get();
        return view('kategori.kategori',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
        'nama_kategori'=>['required','string']
        ],[
        'nama_kategori.required' => 'Kolom Nama Kategori Wajib Diisi!'
        ]);
        Kategori::create([
        'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect()->route('kategori.index')->with('success','Kategori Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
        'nama_kategori'=>['required','string']
        ],[
        'nama_kategori.required' => 'Kolom Nama Kategori Wajib Diisi!'
        ]);
        $kategori->update([
        'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect()->route('kategori.index')->with('success','Kategori Berhasil Diperbarui!');
        }
        
        /**
         * Remove the specified resource from storage.
        */
        public function destroy(Kategori $kategori)
        {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success','Kategori Berhasil Dihapus!');
        }
}
