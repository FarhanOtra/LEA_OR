<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{ 
    protected $table = 'peminjaman';

    const STATUS_BELUM = 1;
    const STATUS_SUDAH = 2;
    const STATUS_TERLAMBAT = 3;
    const STATUSES = [
        self::STATUS_BELUM => 'Belum Dikembalikan',
        self::STATUS_SUDAH => 'Sudah Dikembalikan',
        self::STATUS_TERLAMBAT => 'Terlambat',

    ];

    public function getStatusTextAttribute($value){
        switch ($this->status_peminjaman){
            case self::STATUS_SUDAH:
                return "<span class=\"badge badge-success\">Selesai</span>";
                break;
            case self::STATUS_BELUM:
                return "<span class=\"badge badge-warning\">Belum</span>";
                break;
            case self::STATUS_TERLAMBAT:
                return "<span class=\"badge badge-danger\">Terlambat</span>";
                break;
        }
    }

    public function barang()
    {
        return $this->hasOne(Barang::class,'id','barang_id');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class,'id','mahasiswa_id');
    }

    static $validation_rules = [
        'mahasiswa_id' => 'required',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        'barang' => 'not_in:0'
    ];

    static $validation_message = [
        'mahasiswa_id.required' => 'NIM Peminjam Tidak Boleh Kosong',
        'tanggal_pinjam.required' => 'Field Tanggal Pinjam Tidak Boleh Kosong',
        'tanggal_kembali.required' => 'Field Tanggal Pinjam Tidak Boleh Kosong',
        'tanggal_kembali.after' => 'Tanggal Kembali Harus Sesudah Tanggal Pinjam'
    ];

}
