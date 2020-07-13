<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    const STATUS_TERSEDIA = 1;
    const STATUS_DIPINJAM = 2;
    const STATUS_RUSAK = 3;
    const STATUSES = [
        self::STATUS_TERSEDIA => 'Tersedia',
        self::STATUS_DIPINJAM => 'Dipinjam',
        self::STATUS_RUSAK => 'Rusak',

    ];

    public function getStatusTextAttribute($value){
        switch ($this->status_barang){
            case self::STATUS_TERSEDIA:
                return "<span class=\"badge badge-success\">Tersedia</span>";
                break;
            case self::STATUS_DIPINJAM:
                return "<span class=\"badge badge-info\">Dipinjam</span>";
                break;
            case self::STATUS_RUSAK:
                return "<span class=\"badge badge-danger\">Rusak</span>";
                break;
        }
    }

    static $validation_rules = [
        'id_barang' => 'required|unique:barang',
        'nama_barang' => 'required'
    ];

    static $validation_message = [
        'id_barang.unique' => 'ID Barang Tidak Boleh Sama',
        'id_barang.required' => 'Field ID Barang Tidak Boleh Kosong',
        'nama_barang.required' => 'Field Nama Barang Tidak Boleh Kosong',
    ];

}
