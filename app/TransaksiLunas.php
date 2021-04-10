<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiLunas extends Model
{
    //
    protected $table = 'v_transaksi_lunas';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
