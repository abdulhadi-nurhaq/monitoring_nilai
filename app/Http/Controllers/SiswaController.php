<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    public function index()
    {
    	// mengambil data dari table siswa
    	$siswa = DB::table('siswa')->paginate(10);

    	// mengirim data siswa ke view index
    	return view('indexSiswa',['siswa' => $siswa]);

    }

    // method untuk menampilkan view form tambah siswa
    public function tambah()
    {
        // memanggil view tambah
        return view('tambahSiswa');
    }

    // method untuk insert data ke table siswa
    public function store(Request $request)
    {
        // insert data ke table siswa
        DB::table('siswa')->insert([
            'nama' => $request->nama
        ]);
        // alihkan halaman ke halaman siswa
        return redirect('/siswa');
    }

    // method untuk edit data siswa
    public function edit($id)
    {
        // mengambil data siswa berdasarkan id yang dipilih
        $siswa = DB::table('siswa')->where('id',$id)->get();
        // passing data siswa yang didapat ke view edit.blade.php
        return view('editSiswa',['siswa' => $siswa]);

    }

    // update data siswa
    public function update(Request $request)
    {
        // update data siswa
        DB::table('siswa')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'nilai' => $request->nilai
        ]);
        // alihkan halaman ke halaman siswa
        return redirect('/siswa');
    }

    // method untuk hapus data siswa
    public function hapus($id)
    {
        // menghapus data siswa berdasarkan id yang dipilih
        DB::table('siswa')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman siswa
        return redirect('/siswa');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    	// mengambil data dari table siswa sesuai pencarian data
		$siswa = DB::table('siswa')
		->where('nama','like',"%".$cari."%")
		->paginate();
 
    	// mengirim data siswa ke view index
		return view('indexSiswa',['siswa' => $siswa]);
 
	}

    public function indexNilai()
    {
    	// mengambil data dari table siswa
    	$siswa = DB::table('siswa')->paginate(10);

    	// mengirim data siswa ke view index
    	return view('indexNilai',['siswa' => $siswa]);

    }

    public function cariNilai(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    	// mengambil data dari table siswa sesuai pencarian data
		$siswa = DB::table('siswa')
		->where('nama','like',"%".$cari."%")
		->paginate();
 
    	// mengirim data siswa ke view index
		return view('indexNilai',['siswa' => $siswa]);
 
	}
}