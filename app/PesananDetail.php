<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    //
    protected $fillable = [
        'status_keterangan',
        'keterangan',
        'jumlah_pesanan',
        'total_harga',
        'status',
        'product_id',
        'pesanan_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
}
