<?php

namespace App\Imports;

use App\Models\Pengiriman;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PengirimanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pengiriman([
            'nama_pengirim'=> $row ['nama_pengirim'],
            'tgl_pengiriman'=> $row ['tgl_pengiriman'],
            'driver'=> $row ['driver'],
            'no_pesanan'=> $row ['no_pesanan'],
            'nama_penerima'=> $row ['nama_penerima'],
            'barang' => $row ['barang']
        ]);
    }
}
