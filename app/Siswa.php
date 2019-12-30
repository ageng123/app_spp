<?php

namespace App;

use App\Jurusan;
use App\Kelas;
use App\Detail_User as du;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'spp_siswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nisn', 'nama_siswa_text', 'tpt_lahir', 'tgl_lahir', 'alamat', 'jk', 'jurusan', 'kelas'
    ];
    public $with = ['Detail_user', 'Detail_user.OT'];
    public function Kelas(){
        return $this->hasOne(Kelas::Class, 'id', 'kelas');
    }
    public function Jurusan(){
        return $this->hasOne(Jurusan::Class, 'id', 'jurusan');
    }
    public function Detail_user(){
        return $this->belongsTo(du::class, 'nisn', 'nisn');
    }
}
