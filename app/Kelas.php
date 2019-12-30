<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa;

class Kelas extends Model
{
    protected $table = 'spp_kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kelas_text'
    ];
    
    public function Siswa(){
        return $this->belongsToMany(Siswa::Class, 'kelas');
    }
}
