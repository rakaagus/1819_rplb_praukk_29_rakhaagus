<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = [
        'nama',
        'harga',
        'category_id',
        'is_ready',
        'jenis',
        'gambar'
    ];

    public function category(){

        return $this->belongsTo(Category::class);

    }
    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'product_id', 'id');
    }
}
