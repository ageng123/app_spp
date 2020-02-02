<?php

namespace App\Repositories;

use App\Transaksi as Status_Transaksi;
use Illuminate\Http\Request;
use Session;

class TransactionRepository
{
    protected $status;
    protected $user;
    protected $request;
    protected $jabatan;
    public function __construct(Status_Transaksi $st, Request $r){
        $this->status = $st;
        $this->request = $r;
        // $this->user = $r->session()->get('id_user');
        $this->user = session('id') ;
        $this->jabatan = session('role');

        // $this->jabatan = $r->session()->get('role');
    }
    public function findById($id){
            $model = Status_Transaksi::findOrfail($id);
            return $model;
    }
    public function getall()
    {
        $params = null;
        if($this->jabatan == 1){
            $params = Session::get('detail.siswa.id');
        }
        if($this->jabatan == 99 || $this->jabatan == 3){
            return $this->status->get();
            die;
        }
        return $this->status
            ->where('konseptor_nama', '=', $this->user)
            ->orWhere('konseptor_jabatan', '=', $this->jabatan)
            ->orWhere('approver_nama', '=', $this->user)
            ->orWhere('approver_jabatan', '=', $this->jabatan)
            ->orWhere('nama_siswa', '=', $params)
            ->get();
    }
    public function getTransaksiByStatus($status){
        $user_id = $this->user;
        $jabatan_id = $this->jabatan;
        return $this->status->where(function($query) use($user_id, $status){
            $query->where('konseptor_nama', '=', $user_id)->where('status', '=', $status);

        })->orWhere(function($query) use($user_id, $status){
            $query->where('approver_nama', '=', $user_id)->where('status', '=', $status);
        })->orWhere(function($query) use($jabatan_id, $status){
            $query->where('konseptor_jabatan', '=', $jabatan_id)->where('status', '=', $status);
        })->orWhere(function($query) use($jabatan_id, $status){
            $query->where('approver_jabatan', '=', $jabatan_id)->where('status', '=', $status);
        }
        )->get();
    }
    public function prosesData($status){
        $user_id = $this->user;
        $jabatan_id = $this->jabatan;
        return $this->status->where(function($query) use($user_id, $status){
            $query->where('status', '=', $status);
        })->get();
    }
    public function getDraft(){
        $status = '5';
        return $this->getTransaksiByStatus($status);
    }
    public function getStatus(){
        $status = '1';
        return $this->getTransaksiByStatus($status);
    }
    public function getRejected(){
        $status = '3';
        return $this->getTransaksiByStatus($status);
    }
    public function getApproved(){
        $status = '4';
        return $this->getTransaksiByStatus($status);
    }
    public function getProses(){
        $status = '1';
        return $this->prosesData($status);
    }

}

?>
