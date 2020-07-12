<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mahasiswa;
use App\Barang;
use App\Peminjaman;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{

    
    public function index()
    {
        $peminjaman = DB::table('peminjaman')
        ->join('mahasiswa', 'mahasiswa.nim', '=', 'peminjaman.nim')
        ->join('barang', 'barang.id_barang', '=', 'peminjaman.id_barang')
        ->get();

        return view('peminjaman',['peminjaman' => $peminjaman]);
    }
    
    public function tambah()
    {
        $barang = Barang::where('status_barang',1)->get();
        $mahasiswa = Mahasiswa::get();

        return view('peminjamanbaru',['barang' => $barang],['mahasiswa' => $mahasiswa]);
    }

    public function store(Request $request)
    {
        $check = Mahasiswa::where('nim',$request->nim)->count();
        $mahasiswa = Mahasiswa::where('nim',$request->nim)->first();

        if($check > 0)
        {
            if($mahasiswa->status_mahasiswa == 1)
            {
                $peminjaman = new Peminjaman;
                $peminjaman->nim = $request->nim;
                $peminjaman->id_barang = $request->id_barang;
                $peminjaman->status_peminjaman = 1;
                $peminjaman->save();

                Barang::where('id_barang',$request->id_barang)->update(['status_barang' => 2]);
                Mahasiswa::where('nim',$request->nim)->update(['status_mahasiswa' => 2]);

                return redirect('/peminjaman')->with('status','Data Barang Berhasil Ditambahkan');
            }
            elseif($mahasiswa->status_mahasiswa == 2)
            {
                return redirect('/peminjaman/tambah')->with('error','NIM Belum Mengembalikan Barang');
            }
            elseif($mahasiswa->status_mahasiswa == 3)
            {
                return redirect('/peminjaman/tambah')->with('error','NIM Diblokir');  
            }
        }
        else
        {
            return redirect('/peminjaman/tambah')->with('error','Masukkan NIM dengan Benar');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
