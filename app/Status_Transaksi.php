<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_Transaksi extends Model
{
    protected $table = 'spp_status_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'status_text'
    ];
}
