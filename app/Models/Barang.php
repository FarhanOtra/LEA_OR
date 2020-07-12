<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

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
