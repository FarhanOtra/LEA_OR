<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\Detail_Peminjaman;
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
        $barang = Barang::where('status_barang',1)->get();
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
                $peminjaman->date = $request->date;
                $peminjaman->status_peminjaman = 1;
                $peminjaman->save();

                Mahasiswa::where('id',$request->mahasiswa_id)->update(['status_mahasiswa' => 2]);
                foreach($request->barang as $barang){
                    $detail_peminjaman = new detail_peminjaman;
                    $detail_peminjaman->barang_id = $barang;
                    $detail_peminjaman->save();
                    Barang::where('id',$barang)->update(['status_barang' => 2]);
                };

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
        $peminjaman = Peminjaman::where('id',$id)->first();
        $detailpeminjaman = Detail_Peminjaman::where('peminjaman_id',$id)->get();
        return view('peminjaman.show',['peminjaman' => $peminjaman, 'detailpeminjaman'=> $detailpeminjaman]);
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
