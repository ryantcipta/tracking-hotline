<?php

namespace App\Http\Controllers;

use App\Imports\PengirimanImport;
use App\Models\Pengiriman;
use Illuminate\Contracts\View\View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class PengirimanController extends Controller
{
    public function index() 
    {
        //mengambil data pengiriman
        $pengiriman = Pengiriman::all();
        return view('pengiriman',compact('pengiriman'));
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_order di dalam folder public
		$file->move('file_order',$nama_file);
 
		// import data
		Excel::import(new PengirimanImport, public_path('/file_order/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data pengiriman berhasil diimport!');
 
		// alihkan halaman kembali
		return redirect('/pengiriman');
	}

    public function create() {
        return view('pengiriman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'tgl_pengiriman' => 'required',
            'driver' => 'required|string|max:255',
            'no_pesanan' => 'required|string|max:255',
            'nama_penerima' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
            
        ]);
  
        Pengiriman::create($request->all());
   
        return redirect()->route('pengiriman')->with('success','Data pengiriman berhasil dibuat.');

        // dd($request->all());
    }

    public function edit($id) {
        
        $pengiriman = Pengiriman::findOrFail($id);
        return view('pengiriman.edit',compact('pengiriman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'tgl_pengiriman' => 'required|date',
            'driver' => 'required|string|max:255',
            'no_pesanan' => 'required|string|max:255',
            'nama_penerima' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
        ]);

       // Cari data pengiriman berdasarkan ID
    $pengiriman = Pengiriman::findOrFail($id);

    // Update data dengan input baru
    $pengiriman->update([
        'nama_pengirim' => $request->input('nama_pengirim'),
        'tgl_pengiriman' => $request->input('tgl_pengiriman'),
        'driver' => $request->input('driver'),
        'no_pesanan' => $request->input('no_pesanan'),
        'nama_penerima' => $request->input('nama_penerima'),
        'barang' => $request->input('barang'),

    ]);

    // Redirect ke halaman pengiriman dengan pesan sukses
    return redirect()->route('pengiriman')->with('message', 'Data pengiriman berhasil diupdate.');
 
    }

    public function destroy(Pengiriman $id)
    {
        $id->delete();
        return redirect()
        ->route('pengiriman')
        ->with('message', 'Data pengiriman berhasil dihapus.');
    }

}
