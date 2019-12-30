<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'spp_orangtua';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_orangtua_text', 'id_orangtua', 'no_telp'
    ];
}
