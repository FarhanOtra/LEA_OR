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

    public function update($id)
    {
        //
    }

    public function return($peminjaman,$id)
    {
        //Check Tanggal
        $date = date('Y-m-d');

        $tanggal = Peminjaman::where('id',$peminjaman)->first();
        if($date <= $tanggal->tanggal_kembali){
            $checktanggal = true;
        }else{
            $checktanggal = false;
        }

        $mahasiswa = Peminjaman::where('id',$peminjaman)->first();
        $barang = Detail_Peminjaman::where('id',$id)->first();

        if($checktanggal == true){
            Detail_Peminjaman::where('id',$id)->UPDATE([
                'status' => 2,
                'tanggal_kembali' => $date,
            ]);

            Mahasiswa::where('id',$mahasiswa->mahasiswa_id)->UPDATE([
                'status_mahasiswa' => 1,
            ]);
            
            Barang::where('id',$barang->barang_id)->UPDATE([
                'status_barang' => 1,
            ]);

        }else{
            Detail_Peminjaman::where('id',$id)->UPDATE([
                'status' => 3,
                'tanggal_kembali' => $date,
            ]);

            Mahasiswa::where('id',$mahasiswa->mahasiswa_id)->UPDATE([
                'status_mahasiswa' => 3,
            ]);

            Barang::where('id',$barang->barang_id)->UPDATE([
                'status_barang' => 1,
            ]);
        }

        //Check Semua Pengembalian
        $check1 = Detail_Peminjaman::where('peminjaman_id',$peminjaman)->where('status','1')->count();
        $check2 = Detail_Peminjaman::where('peminjaman_id',$peminjaman)->where('status','3')->count();
        if($check1 == 0 && $check2 == 0){
            Peminjaman::where('id',$peminjaman)->UPDATE([
                'status_peminjaman' => 2,
            ]);
        }elseif($check2 > 0 ){
            Peminjaman::where('id',$peminjaman)->UPDATE([
                'status_peminjaman' => 3,
            ]);
        }

        return redirect()->route('peminjaman.show', $peminjaman);
    }

    public function blacklist()
    {
        $mahasiswa = Mahasiswa::where('status_mahasiswa',3)->get();
        return view('peminjaman.blacklist',['mahasiswa' => $mahasiswa]);
    }

    public function unblacklist($id)
    {
        Mahasiswa::where('id',$id)->UPDATE([
            'status_mahasiswa' => 1,
        ]);;
        notify('success', 'Mahasiswa Berhasil di Hapus dari Blacklist');
        return redirect()->route('peminjaman.blacklist');
    }
}
