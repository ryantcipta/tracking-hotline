<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";

    protected $fillable = [
        "no_pop_hotline",
        "tgl_order",   
        "no_po_md",
        "tgl_proses_md",
        "cm",
        "nama_dealer",
        "nama_konsumen",
        "alamat",
        "no_hp",
        "type_motor",
        "tahun",
        "no_rangka",
        "no_mesin",
        "no_po_ahm",
        "tgl_order_ke_ahm",
        "part_no",
        "description",
        "qty",
        "etd_ahm",
        "ps_ahm",
        "tgl_supply_ahm",
        "tgl_gi_supply_md",
        
    
    ];
}
