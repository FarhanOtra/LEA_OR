<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::orderBy('id_barang','asc')->get();
        return view('barang.index',['barang' => $barang]);
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate(Barang::$validation_rules,Barang::$validation_message);

        $barang = new Barang;
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->status_barang = 1;
        $barang->keterangan = $request->keterangan;

        $barang->save();

        notify('success', 'Berhasil Menambahkan Barang');
        return redirect()->route('barang.index');
        
    }

    public function edit($id)   
    {
        $barang = Barang::where('id',$id)->first();
        return view('barang.edit',['barang' => $barang]);
    }

    public function update($id,Request $request)
    {
        $request->validate(
            ['id_barang' => 'required|unique:barang,id_barang,'.$id,
            'nama_barang' => 'required',
            'status_barang' => 'required'
            ],
        Barang::$validation_message);

        Barang::where('id',$id)->UPDATE([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'status_barang' => $request->status_barang,
            'keterangan' => $request->keterangan
        ]);

        notify('success', 'Berhasil Merubah Barang');
        return redirect()->route('barang.index');
    }

    public function destroy($id)
    {
        Barang::where('id',$id)->DELETE();
        notify('success', 'Barang Berhasil Dihapus');
        return redirect()->route('barang.index');
    }



}
