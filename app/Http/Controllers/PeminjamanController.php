<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{

    public function index()
    {
        $peminjaman = Peminjaman::all();

        return view('peminjaman.index',['peminjaman' => $peminjaman]);
    }
    
    public function create()
    {
        $mahasiswa = Mahasiswa::pluck('nim','id');
        $barang = Barang::where('status_barang',1)->pluck('nama_barang','id');
        return view('peminjaman.create',['mahasiswa' => $mahasiswa,'barang' => $barang]);
    }

    public function store(Request $request)
    {
        $check = Mahasiswa::where('id',$request->mahasiswa_id)->count();
        $mahasiswa = Mahasiswa::where('id',$request->mahasiswa_id)->first();

            if($mahasiswa->status_mahasiswa == 1)
            {
                $peminjaman = new Peminjaman;
                $peminjaman->mahasiswa_id = $request->mahasiswa_id;
                $peminjaman->barang_id = $request->barang_id;
                $peminjaman->status_peminjaman = 1;
                $peminjaman->save();

                Barang::where('id',$request->barang_id)->update(['status_barang' => 2]);
                Mahasiswa::where('id',$request->mahasiswa_id)->update(['status_mahasiswa' => 2]);

                notify('success', 'Berhasil Meminjam Barang');
                return redirect()->route('peminjaman.index');
            }
            elseif($mahasiswa->status_mahasiswa == 2)
            {
                notify('error', 'Belum Mengembalikan Barang');
                return redirect()->route('peminjaman.create');
            }
            elseif($mahasiswa->status_mahasiswa == 3)
            {
                notify('error', 'NIM di Banned');
                return redirect()->route('peminjaman.create');;  
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
