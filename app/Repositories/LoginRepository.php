<?php
namespace App\Repositories;

use Hash;
use App\ManajemenUser as mu;
use Illuminate\Http\Request;

use Session;

class LoginRepository
{
    protected $authenticate;
    protected $req;
    public function __construct(Request $request)
    {
        $this->authenticate = false;
        $this->req = $request;
    }
    public function checkLogin(){
        $username = $this->req->username;
        $password = $this->req->password;
        $checkUsername = mu::where('username', '=', $username)->first();
        if($checkUsername){
            $checkPassword = Hash::check($password, $checkUsername->password);
            if($checkPassword){
                $checkUsername->loadMissing('Detail', 'Detail.Role', 'Detail.OT', 'Detail.Siswa', 'Detail.Karyawan');
                $checkUsername->jabatan = $checkUsername->Detail->Role->jabatan_text;
                $checkUsername->role = $checkUsername->Detail->role; 
                if($checkUsername->jabatan == 'Siswa'){ 
                    $checkUsername->nisn = $checkUsername->Detail->Siswa->nisn;
                    $checkUsername->nama = $checkUsername->Detail->Siswa->nama_siswa_text;
                    $checkUsername->nik_wali = $checkUsername->Detail->OT->id_orangtua;
                    $checkUsername->nama_wali = $checkUsername->Detail->OT->nama_orangtua_text;
                    $checkUsername->no_telp = $checkUsername->Detail->OT->no_telp;
                    $checkUsername->jurusan = $checkUsername->Detail->Siswa->Jurusan->jurusan_text;
                    $checkUsername->kelas = $checkUsername->Detail->Siswa->Kelas->kelas_text;
                } elseif($checkUsername->jabatan == 'Wali Murid'){
                    $checkUsername->nama = $checkUsername->Detail->OT->nama_orangtua_text;
                    $checkUsername->nama_siswa = $checkUsername->Detail->Siswa->nama_siswa_text;
                    $checkUsername->jurusan = $checkUsername->Detail->Siswa->Jurusan->jurusan_text;
                    $checkUsername->kelas = $checkUsername->Detail->Siswa->Kelas->kelas_text;
                } else {
                    if($checkUsername->role == 0){
                        $checkUsername->nama = 'superadmin';
                        $checkUsername->nik = 'admin';
                    } else {
                        $checkUsername->nama = $checkUsername->Detail->Karyawan->nama_karyawan_text;
                        $checkUsername->nik = $checkUsername->Detail->Karyawan->nik;

                    }
                }
                $updatelog = mu::findOrfail($checkUsername->id);
                date_default_timezone_set('Asia/Jakarta');
                $updatelog->last_login = date('Y-m-d H:i:s');
                $updatelog->save();
                Session::flush();
                Session::put($checkUsername->toArray());
                return redirect(route('Semua.index'));
            } else {
                return redirect()->back()->with('message', 'Password anda salah');
            }
        } else {
            return redirect()->back()->with('message', 'username tidak ditemukan');
        }

    }
    public function logout()
    {
       $logout = Session::flush();
       return redirect(route('auth.login'));

    }
}
?>
