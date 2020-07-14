<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_peminjaman extends Model
{
    protected $table = 'detail_peminjaman';

    public function barang()
    {
        return $this->belongsTo(Barang::class,'barang_id','id');
    }
}
