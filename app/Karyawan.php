<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Detail_user as du;

class Karyawan extends Model
{
    protected $table = 'spp_karyawan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik', 'nama_karyawan_text', 'tpt_lahir', 'tgl_lahir', 'jk', 'alamat', 'no_telp'
    ];
    public function Detail(){
        return $this->belongsTo(du::class, 'nik', 'nik');
    }
}
