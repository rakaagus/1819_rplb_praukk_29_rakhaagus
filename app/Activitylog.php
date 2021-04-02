<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitylog extends Model
{
    //
    protected $fillable = ['nama_log', 'deskripsi', 'tabel', 'referensi_id', 'user_id', 'new_item', 'old_item'];
    public function user(){

        return $this->belongsTo(User::class);
    
    }
}

