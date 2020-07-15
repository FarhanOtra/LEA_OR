<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_peminjaman extends Model
{
    const STATUS_BELUM = 1;
    const STATUS_SUDAH = 2;
    const STATUS_TERLAMBAT = 3;
    const STATUSES = [
        self::STATUS_BELUM => 'Belum Dikembalikan',
        self::STATUS_SUDAH => 'Sudah Dikembalikan',
        self::STATUS_TERLAMBAT => 'Terlambat',

    ];

    public function getStatusTextAttribute($value){
        switch ($this->status){
            case self::STATUS_SUDAH:
                return "<span class=\"badge badge-success\">Sudah</span>";
                break;
            case self::STATUS_BELUM:
                return "<span class=\"badge badge-warning\">Belum</span>";
                break;
            case self::STATUS_TERLAMBAT:
                return "<span class=\"badge badge-danger\">Terlambat</span>";
                break;
        }
    }

    protected $table = 'detail_peminjaman';

    public function barang()
    {
        return $this->belongsTo(Barang::class,'barang_id','id');
    }
}
