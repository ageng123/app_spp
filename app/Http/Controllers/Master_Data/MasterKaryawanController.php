<?php

namespace App\Http\Controllers\master_data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Karyawan;
use App\Detail_user as du;
use App\ManajemenUser as mu;

use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\KaryawanFormType;

class MasterKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::with(['Detail.Role'])->get();
        $data = [
            'row' => $karyawan
        ];
        return view('templates.pages.MasterData.MasterKaryawan')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, FormBuilder $builder)
    {
        $model = new Karyawan;
        $form = $builder->create(KaryawanFormType::class, [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'POST',
            'url' => route('karyawan.create')
        ]);
        if($request->has('Submit')){
            if(isset($request->_token)){
                $model->nik = $request->nik;
                $model->nama_karyawan_text = $request->nama_karyawan_text;
                $model->alamat = $request->alamat;
                $model->tpt_lahir = $request->tpt_lahir;
                $model->tgl_lahir = $request->tgl_lahir;
                $model->jk = $request->jk;
                $model->no_telp = $request->no_telp;
                $mu = new mu;
                $mu->nomor_induk = $request->nik;
                $mu->username = $request->nik;
                $mu->password = Hash::make($request->nik);
                $mu->save();
                $detail = new du;
                $detail->role = $request->jabatan;
                $detail->nik = $request->nik;
                $detail->id_user = $mu->id;
                $detail->save();
                $save = $model->save();
                return $save ? redirect(route('karyawan.index'))->with('message', 'Data Karyawan '.$detail->nik.' Berhasil Ditambahkan') : redirect()->back()->with('message', $request->nama_karyawan_text." Gagal Ditambahkan ") ;
            }
        } else {
            $data = [
                'form' => $form,
                'form_title' => 'Tambah Master Data Karyawan',
                'edit' => false
            ];
            return view('templates.pages.MasterData.AddMasterKaryawan')->with($data);
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
    public function show($id)
    {
        $model = Karyawan::findOrfail($id);
        $model->loadMissing('Detail.Role');
        $model['jabatan'] = $model->Detail->Role->jabatan_text;
        $data = [
            'data' => $model,
            'form_title' => 'Preview Data Master Siswa',
        ];  
        return view('templates.pages.MasterData.PreviewMasterKaryawan')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $builder)
    {
        $model = Karyawan::findOrfail($id);
        $model->loadMissing('Detail');
        $model['jabatan'] = $model->Detail->role;
        $form = $builder->create(KaryawanFormType::class,
            [
                'class' => 'uk-form-horizontal uk-grid',
                'method' => 'PUT',
                'url' => route('karyawan.update', ['karyawan' => $id]),
                'model' => $model->toArray()
            ]
        );
        $data = [
            'form' => $form,
            'form_title' => 'Edit Master Data Karyawan',
            'edit' => false
        ];
        return view('templates.pages.MasterData.AddMasterKaryawan')->with($data);
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
        $model = Karyawan::findOrfail($id);
        if($request->has('_token')){
            $detail = du::where('nik', $model->nik)->update([
                'nik' => $request->nik,
                'role' => $request->jabatan
            ]);
            $mu = mu::where('username', $model->nik)->update([
                'username' => $request->nik
            ]);
            $model->nik = $request->nik;
                $model->nama_karyawan_text = $request->nama_karyawan_text;
                $model->alamat = $request->alamat;
                $model->tpt_lahir = $request->tpt_lahir;
                $model->tgl_lahir = $request->tgl_lahir;
                $model->jk = $request->jk;
                $model->no_telp = $request->no_telp;
                $model->Detail->role = $request->jabatan;
                $save = $model->save();
                return $save ? redirect(route('karyawan.index'))->with('message', 'Data Karyawan '.$model->nama_karyawan_text.' Berhasil Diupdate') : redirect()->back()->with('message', $request->nama_karyawan_text." Gagal Diupdate ") ;
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
        $save = Karyawan::destroy($id);
        return $save ? redirect(route('karyawan.index'))->with('message', 'Data Karyawan Berhasil DiHapus') : redirect()->back()->with('message  Gagal Dihapus') ;
    }
}
