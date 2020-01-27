<?php

namespace App\Http\Controllers\Spp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Service Import
use App\Services\TransactionRepositoryServices as TRS;
//Model Import
use App\Status_transaksi as st;
use App\Siswa as s;
use App\OrangTua as ot;
use App\Jurusan as j;
use App\Kelas as k;
use App\Karyawan as kar;
use App\Role as r;
use App\Transaksi as t;
use Session;
//FormInput Import
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\ApproveSppFormType;



class ProsesController extends Controller
{
    protected $model;
    public function __construct(TRS $trs)
    {
        $this->model = $trs;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = $this->model->getProses();
        $jabatan_user = Session::get('role');
        
        $data = [
            'row' => $rows,
            'jabatan' => $jabatan_user
        ];
        // dd($rows->toArray());
        // die;
        return view('templates.pages.Spp.IndexProses')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $process = $this->model->findById($id);
        $process->loadMissing('Konseptor', 'Siswa', 'Ot', 'Status', 'JabatanKonseptor', 'JabatanApprover');
        // dd($process->toArray());
        $form = $builder->create(ApproveSppFormType::class,
        [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'PUT',
            'url' => route('Proses.update',['Prose' => $id]),
        ]);
        $data = [
            'rows' => $process,
            'form_title' => 'Data Spp '.$process->Siswa->nama_siswa_text.' '. date('j F Y', strtotime($process->tgl_bayar)),
            'form' => $form 
        ];
        return view('templates.pages.Spp.Proses')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($request->has('Submit')){
           $action = $request->Submit;
           $process = t::findOrfail($id);
           if($action == 'approve'){
            $process->status = '4';
            $process->approver_nama = Session::get('id');
            $process->approver_jabatan = Session::get('role');
            $process->kode_transaksi = md5(md5(date('Y-m-d').Session::get('id').Session::get('role')));
            $process->step = $process->step + 1;
           } else {
            $process->status = '3';
           }
           $save = $process->save();
           return $save ? redirect(route('Proses.index'))->with('message', 'Data SPP Berhasil Diupdate') : redirect()->back()->with('SPP Id : ', $id.", Gagal Diupdate ") ;
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
        //
    }
}
