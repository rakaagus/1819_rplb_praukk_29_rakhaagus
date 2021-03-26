<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananLunas extends Model
{
    //
    protected $table = 'v_pesanan_lunas';

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
