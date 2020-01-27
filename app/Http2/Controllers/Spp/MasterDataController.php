<?php

namespace App\Http\Controllers\SPP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Service Import
use Session;
use App\Services\TransactionRepositoryServices as TRS;
use PDF;
//Model Import
use App\Status_transaksi as st;
use App\Siswa as s;
use App\OrangTua as ot;
use App\Jurusan as j;
use App\Kelas as k;
use App\Karyawan as kar;
use App\Role as r;
use App\Transaksi as t;
//FormInput Import
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\SppFormType;
use App\Forms\PrintSppFormType;



class MasterDataController extends Controller
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
        $rows = $this->model->getAll();
        $rows->loadMissing('Konseptor', 'Siswa', 'Ot', 'Status', 'JabatanKonseptor', 'JabatanApprover');
        $data = [
            'row' => $rows
        ];
        return view('templates.pages.Spp.Index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $builder, Request $request)
    {
        $form = $builder->create(SppFormType::class,
        [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'POST',
            'url' => route('Semua.create'),
        ]);
        if($request->has('Submit')){
            if($request->has('_token')){
                $save = 'fail';
                foreach($request->bulan as $bulan){
                    $model = new t;
                    $model->kode_transaksi = '4321';
                    $model->nama_siswa = $request->nama_siswa;
                    $model->step = '1';
                    $model->konseptor_nama = Session::get('id');
                    $model->konseptor_jabatan = Session::get('role');
                    $model->tgl_bayar = $request->tgl_bayar;
                    $model->bulan = $bulan;
                    $model->periode = $request->periode;
                    $model->tahun_ajaran = $request->tahun_ajaran;
                    $model->status = '2';
                    $model->tgl_submit = date('Y-m-d H:i:s');
                    $model->bayar = '200000';
                    $model->save();
                    $save = 'success';
                };
               if($save != 'success'){
                    return redirect()->back();
                } else {
                    return redirect(route('Status.index'));
                }
            }
        }
        $data = [
            'form' => $form,
            'form_title' => 'Tambah Transaksi SPP',
            'edit' => false
        ];
        return view('templates.pages.Spp.Add')->with($data);
    }
    public function print(Request $request, FormBuilder $builder){
        $form = $builder->create(PrintSppFormType::class, [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'POST',
            'url' => route('Semua.print')
        ]);
        if($request->has('Submit') || Session::get('role') == 2 || Session::get('role') == 1){
                dd($request->toArray());
        }
        $data = [
            'form' => $form,
            'form_title' => 'Tambah Transaksi SPP',
            'edit' => false
        ];
        return view('templates.pages.Spp.Print')->with($data);
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
        $process = $this->model->findById($id);
        $process->loadMissing('Konseptor', 'Siswa', 'Ot', 'Status', 'JabatanKonseptor', 'JabatanApprover');
        // dd($process->toArray());
        $data = [
            'rows' => $process,
            'form_title' => 'Data Spp '.$process->Siswa->nama_siswa_text.' '. date('j F Y', strtotime($process->tgl_bayar)) 
        ];
        return view('templates.pages.Spp.View')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $process = $this->model->findById($id);
        $process->loadMissing('Konseptor', 'Siswa', 'Ot', 'Status', 'JabatanKonseptor', 'JabatanApprover');
        dd($process->toArray());
        $data = [
            'rows' => $process,
            'form_title' => 'Data Spp '.$process->Siswa->nama_siswa_text.' '. date('j F Y', strtotime($process->tgl_bayar)) 
        ];
        return view('templates.pages.Spp.Proses')->with($data);
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
        $action = $request->submit;
        if($request->has('submit')){
            $process = t::find($id);
            switch($action){
                case 'submit':
                    $process->status = '4';
                    $process->save();
                    return redirect(route('Status.index'));
                break;
                case 'reject':
                    $process->status = '3';
                    $process->save();
                    return redirect(route('Status.index'));
                break;
                case 'sendback':
                    return redirect(route('Status.index'));
                break;
            }
        };
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
