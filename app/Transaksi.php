<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status_Transaksi as st;
use App\Karyawan as k;
use App\Siswa as s;
use App\Role as r;
use App\OrangTua as ot;
use App\Detail_User as du;

class Transaksi extends Model
{
    protected $table = 'spp_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'refid',
        'kode_transaksi',
        'bayar',
        'nama_siswa',
        'nama_orangtua',
        'step',
        'konseptor_nama',
        'konseptor_jabatan',
        'approver_nama',
        'approver_jabatan',
        'tgl_bayar',
        'bulan',
        'periode',
        'tahun_ajaran',
        'status',
        'tgl_submit',
        'tgl_approver'
    ];
    public function Siswa(){
        return $this->hasOne(s::class, 'id', 'nama_siswa');
    }
    public function Ot(){
        return $this->hasOne(ot::class, 'id', 'nama_orangtua');
    }
    public function Konseptor(){
        return $this->hasOne(k::class, 'id', 'konseptor_nama');
    }
    public function Approver(){
        return $this->hasOne(k::class, 'id', 'approver_nama');
    }
    public function Status(){
        return $this->hasOne(st::class, 'id', 'status');
    }
    public function JabatanKonseptor(){
        return $this->hasOne(r::class, 'id', 'konseptor_jabatan');
    }
    public function JabatanApprover(){
        return $this->hasOne(r::class, 'id', 'approver_jabatan');
    }
}
