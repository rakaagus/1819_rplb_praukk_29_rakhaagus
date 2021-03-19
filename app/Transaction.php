<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    protected $fillable = [
        'pesanan_id',
        'user_id',
        'total_bayar',
        'status'
    ];


    public function user(){

        return $this->belongsTo(User::class);

    }

    public function pesanan(){

        return $this->hasOne(Pesanan::class);

    }

}
