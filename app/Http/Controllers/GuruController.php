<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GuruController extends Controller
{
    public function index()
    {
    	// mengambil data dari table guru
    	$guru = DB::table('guru')->paginate(10);

    	// mengirim data guru ke view index
    	return view('index',['guru' => $guru]);

    }

    // method untuk menampilkan view form tambah guru
    public function tambah()
    {
        // memanggil view tambah
        return view('tambah');
    }

    // method untuk insert data ke table guru
    public function store(Request $request)
    {
        // insert data ke table guru
        DB::table('guru')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'umur' => $request->umur,
            'alamat' => $request->alamat
        ]);
        // alihkan halaman ke halaman guru
        return redirect('/guru');
    }

    // method untuk edit data guru
    public function edit($id)
    {
        // mengambil data guru berdasarkan id yang dipilih
        $guru = DB::table('guru')->where('id',$id)->get();
        // passing data guru yang didapat ke view edit.blade.php
        return view('edit',['guru' => $guru]);

    }

    // update data guru
    public function update(Request $request)
    {
        // update data guru
        DB::table('guru')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'umur' => $request->umur,
            'alamat' => $request->alamat
        ]);
        // alihkan halaman ke halaman guru
        return redirect('/guru');
    }

    // method untuk hapus data guru
    public function hapus($id)
    {
        // menghapus data guru berdasarkan id yang dipilih
        DB::table('guru')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman guru
        return redirect('/guru');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    	// mengambil data dari table guru sesuai pencarian data
		$guru = DB::table('guru')
		->where('nama','like',"%".$cari."%")
		->paginate();
 
    	// mengirim data guru ke view index
		return view('index',['guru' => $guru]);
 
	}
}