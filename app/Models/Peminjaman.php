<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    public function barang()
    {
        return $this->hasOne(Barang::class,'id','barang_id');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class,'id','mahasiswa_id');
    }
}
