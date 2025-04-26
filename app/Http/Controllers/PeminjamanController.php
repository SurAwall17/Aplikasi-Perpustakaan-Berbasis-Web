<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function daftar_buku(){
        $data = Buku::all();
        return view('/buku', [
            'title' => 'buku',
            'data' => $data]);
    }

    public function form_peminjaman(){
        $data = Buku::all();
        return view('/pinjam',[
            'data' => $data
        ]);
    }

    public function tambah_peminjaman(Request $request){
        Peminjaman::create([
            'id_user' => auth()->user()->id,
            'id_buku' => $request->id_buku,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status' => 'dipinjam'
        ]);
        return redirect('buku');
    }

    public function data_peminjaman(){
        $no = 1;
        $data = Peminjaman::with(['user', 'buku'])->get();
        return view('/peminjaman', [
            'data' => $data,
            'no' => $no
        ]);
    }
    public function form_pengembalian(){
        return view('/pengembalian');
    }
}
