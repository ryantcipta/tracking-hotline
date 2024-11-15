<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
   protected $table = "pengiriman";

   protected $fillable = ['nama_pengirim','tgl_pengiriman','driver','no_pesanan','nama_penerima','barang','status'];
}
