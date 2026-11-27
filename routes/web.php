<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;

Route::get('/', [BarangController::class,'index']);
Route::get('/data', [BarangController::class,'data']);
Route::get('/tambah', [BarangController::class,'tambah']);
Route::post('/tambah', [BarangController::class,'store']);
Route::get('/{id}/detail',[BarangController::class,'detail']);
Route::get('/{id}/edit',[BarangController::class,'edit']);
Route::put('/{id}/edit',[BarangController::class,'update']);
Route::delete('/{id}/deleteimg',[BarangController::class,'deleteImg']);
Route::delete('/{id}/delete',[BarangController::class,'delete']);

Route::resource('kategori',KategoriController::class);