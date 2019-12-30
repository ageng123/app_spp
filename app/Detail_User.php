<?php

namespace App;

use App\Siswa;
use App\OrangTua as ot;
use App\ManajemenUser as mu;
use App\Role;
use App\Karyawan as k;
use Illuminate\Database\Eloquent\Model;

class Detail_User extends Model
{
    protected $table = 'spp_detail_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nik', 'nisn', 'id_orangtua', 'id_user', 'role'
    ];
    public function Siswa(){
        return $this->hasOne(Siswa::class, 'nisn', 'nisn');
    }
    public function OT(){
        return $this->hasOne(ot::class, 'id_orangtua', 'id_orangtua');
    }
    public function Karyawan(){
        return $this->hasOne(k::class, 'nik', 'nik');
    }
    public function Role(){
        return $this->hasOne(Role::class, 'id', 'role');
    }
}
