<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'spp_jurusan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jurusan_text'
    ];
    public function Siswa(){
        return $this->belongsToMany(App\Siswa::class, 'id');
    }
}
