<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Barang extends Model
{   
use HasUuids;
   protected $table = 'tb_barang';
   protected $primaryKey = 'id';
   protected $fillable = ['nama_barang','deskripsi','jumlah_barang','harga_satuan','image'];
   protected $guarded = ['id'];
}
