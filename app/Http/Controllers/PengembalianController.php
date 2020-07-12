<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Peminjaman;
use App\Mahasiswa;
use App\Barang;

class PengembalianController extends Controller
{
    public function pengembalian($id){
        $peminjaman = Peminjaman::where('id',$id)->first();
        Barang::where('id_barang',$peminjaman->id_barang)->UPDATE([
            'status_barang' => 1,
        ]);
        Mahasiswa::where('nim',$peminjaman->nim)->UPDATE([
            'status_mahasiswa' => 1,
        ]);
        Peminjaman::where('id',$peminjaman->id)->UPDATE([
            'status_peminjaman' => 2,
        ]);
        return redirect('/peminjaman')->with('status','Barang Berhasil Dikembalikan');
    }
}
