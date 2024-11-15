<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class OrderImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Order([
            "no_pop_hotline" => $row["no_pop_hotline"],
            "tgl_order" => $row["tgl_order"],   
            "no_po_md" => $row["no_po_md"],
            "tgl_proses_md" => $row["tgl_proses_md"],
            "cm" => $row["cm"],
            "nama_dealer" => $row["nama_dealer"],
            "nama_konsumen" => $row["nama_konsumen"],
            "alamat" => $row["alamat"],
            "no_hp" => $row["no_hp"],
            "type_motor" => $row["type_motor"],
            "tahun" => $row["tahun"],
            "no_rangka" => $row["no_rangka"],
            "no_mesin" => $row["no_mesin"],
            "no_po_ahm" => $row["no_po_ahm"],
            "tgl_order_ke_ahm" => $row["tgl_order_ke_ahm"],
            "part_no" => $row["part_no"],
            "description" => $row["description"],
            "qty" => $row["qty"],
            "etd_ahm" => $row["etd_ahm"],
            "ps_ahm" => $row["ps_ahm"],
            "tgl_supply_ahm" => $row["tgl_supply_ahm"],
            "tgl_gi_supply_md" => $row["tgl_gi_supply_md"],
        ]);
    }
}
