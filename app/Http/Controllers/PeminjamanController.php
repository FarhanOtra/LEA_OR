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
        $peminjaman = Peminjaman::orderBy('tanggal_pinjam','asc')->get();
        return view('peminjaman.index',['peminjaman' => $peminjaman]);
    }
    
    public function create()
    {
        $mahasiswa = Mahasiswa::pluck('nim','id');
        $barang = Barang::where('status_barang',1)->orderBy('id_barang','asc')->get();
        return view('peminjaman.create',['mahasiswa' => $mahasiswa,'barang' => $barang]);
    }

    public function store(Request $request)
    {
        $request->validate(Peminjaman::$validation_rules,Peminjaman::$validation_message);

        $mahasiswa = Mahasiswa::where('id',$request->mahasiswa_id)->first();

        if(!empty($request->barang)){
            if($mahasiswa->status_mahasiswa == 1)
            {
                $peminjaman = new Peminjaman;
                $peminjaman->mahasiswa_id = $request->mahasiswa_id;
                $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
                $peminjaman->tanggal_kembali = $request->tanggal_kembali;
                $peminjaman->status_peminjaman = 1;
                $peminjaman->save();

                Mahasiswa::where('id',$request->mahasiswa_id)->update(['status_mahasiswa' => 2]);
                $peminjaman_id = Peminjaman::latest('id')->first()->id;
                foreach($request->barang as $barang){
                    $detail_peminjaman = new detail_peminjaman;
                    $detail_peminjaman->peminjaman_id = $peminjaman_id;
                    $detail_peminjaman->barang_id = $barang;
                    $detail_peminjaman->status = 1;
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
                notify('error', 'NIM di Blacklist');
                return redirect()->route('peminjaman.create');
            }
        }else{
            notify('error', 'Pilih Minimal 1 Barang');
            return redirect()->route('peminjaman.create');
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
