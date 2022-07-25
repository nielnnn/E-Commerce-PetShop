<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanandetail extends Model
{
    use HasFactory;
    protected $table = 'pesanandetail';
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk', 'id_barang');
    }
}
