<?php

namespace App\Http\Controllers\master_data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Siswa;
use App\Kelas;
use App\Jurusan;
use App\ManajemenUser as mu;
use App\OrangTua as Wali;
use App\Detail_User as du;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\SiswaFormType;

class MasterSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = Siswa::with(['Jurusan', 'Kelas'])->get();
        $data = [
            'row' => $process
        ];
        return view('templates.pages.MasterData.MasterSiswa')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $builder, Request $request)
    {
        $form = $builder->create(SiswaFormType::class,
            [
                'class' => 'uk-form-horizontal uk-grid',
                'method' => 'POST',
                'url' => route('siswa.create')
            ]
        );
        if($request->has('Submit')){
            $data = $form->getFields();
            // dd($data);
            if($request->_token != null){
                $siswa = new Siswa;
                $siswa->nisn = $request->nisn;
                $siswa->nama_siswa_text = $request->nama_siswa_text;
                $siswa->tpt_lahir = $request->tpt_lahir;
                $siswa->tgl_lahir = $request->tgl_lahir;
                $siswa->alamat = $request->alamat;
                $siswa->jk = $request->jk;
                $siswa->jurusan = $request->jurusan;
                $siswa->kelas = $request->kelas;
                $save = $siswa->save();
                $wali = new Wali;
                $wali->id_orangtua = $request->id_orangtua;
                $wali->nama_orangtua_text = $request->nama_orangtua_text;
                $wali->no_telp = $request->no_telp;
                $wali->save();
                $mu_siswa = new mu;
                $mu_siswa->nomor_induk = $request->nisn;
                $mu_siswa->username = $request->nisn;
                $mu_siswa->password = Hash::make('4321');
                $mu_siswa->save();
                $mu_ortu = new mu;
                $mu_ortu->nomor_induk = $request->id_orangtua;
                $mu_ortu->username = $request->no_telp;
                $mu_ortu->password = Hash::make('4321');
                $mu_ortu->save();
                $du_siswa = new du;
                $du_siswa->nisn = $request->nisn;
                $du_siswa->id_orangtua = $request->id_orangtua;
                $du_siswa->id_user = $mu_siswa->id;
                $du_siswa->role = '1';
                $du_siswa->save();
                $du_wali = new du;
                $du_wali->nisn = $request->nisn;
                $du_wali->id_orangtua = $request->id_orangtua;
                $du_wali->id_user = $mu_ortu->id;
                $du_wali->role = '2';
                $du_wali->save();
                return $save ? redirect(route('siswa.index'))->with('message', 'Data Siswa Berhasil Ditambahkan') : redirect()->back()->with('message', $request->nama." Gagal Ditambahkan ") ;
            };
        } else {
            $data = [
                'form' => $form,
                'form_title' => 'Tambah Master Data Mahasiswa',
                'edit' => false
            ];
            return view('templates.pages.MasterData.AddMasterSiswa')->with($data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, FormBuilder $builder)
    {
        $model = Siswa::findOrfail($id);
        $model->loadMissing('Detail_user.OT', 'Kelas', 'Jurusan');
        $model['nama_orangtua_text'] = $model->Detail_User->OT->nama_orangtua_text;
        $model['id_orangtua'] = $model->Detail_User->OT->id_orangtua;
        $model['no_telp'] = $model->Detail_User->OT->no_telp;
        
        $data = [
            'data' => $model,
            'form_title' => 'Preview Data Master Siswa',
        ];  
        return view('templates.pages.MasterData.PreviewMasterSiswa')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $builder)
    {
        $model = Siswa::findOrfail($id);
        $model->loadMissing('Detail_user.OT');
        $model['nama_orangtua_text'] = $model->Detail_User->OT->nama_orangtua_text;
        $model['id_orangtua'] = $model->Detail_User->OT->id_orangtua;
        $model['no_telp'] = $model->Detail_User->OT->no_telp;
        $data = [];
        $form = $builder->create(SiswaFormType::class,
            [
                'class' => 'uk-form-horizontal uk-grid',
                'method' => 'PUT',
                'url' => route('siswa.update', ['siswa' => $id]),
                'model' => $model->toArray()
            ]
        );
        $data = [
            'form' => $form,
            'form_title' => 'Edit Data Master Siswa',
            'edit' => true
        ];  
        return view('templates.pages.MasterData.AddMasterSiswa')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrfail($id);
        try{
            if($request->_token != null){
                $params = $siswa->nisn;
                $siswa->nisn = $request->nisn;
                $siswa->nama_siswa_text = $request->nama_siswa_text;
                $siswa->tpt_lahir = $request->tpt_lahir;
                $siswa->tgl_lahir = $request->tgl_lahir;
                $siswa->alamat = $request->alamat;
                $siswa->jk = $request->jk;
                $siswa->jurusan = $request->jurusan;
                $siswa->kelas = $request->kelas;
                $mu_var = mu::where('username', $params)->first();
                $mu_siswa = mu::where('username', $params)->update([
                    'nomor_induk' => $request->nisn,
                    'username' => $request->nisn
                ]);
                $du_siswa = du::where('id_user', $mu_var->id)->update([
                    'nisn' => $request->nisn
                ]);
                $save = $siswa->save();
                return $save ? redirect(route('siswa.index'))->with('message', 'Data Siswa '.$siswa->nama_siswa_text.' Berhasil Di Update') : redirect()->back()->with('message', $request->nama." Gagal Ditambahkan ") ;
            };
        } catch (Expression $e){
            return redirect()->back()->with('error :', $e) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $var = Siswa::destroy($id);
        return $var ? redirect(route('siswa.index'))->with('message', 'Data Siswa Berhasil Dihapus') : redirect()->back()->with('Siswa Id : ', $id.", Gagal Dihapus ") ;
    }
}
