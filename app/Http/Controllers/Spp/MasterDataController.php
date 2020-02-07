<?php

namespace App\Http\Controllers\SPP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Service Import
use Session;
use App\Services\TransactionRepositoryServices as TRS;
use Illuminate\Support\Facades\DB;

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
        dd(Session::all());
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
                    if((int)$bulan <= 6){
                        $model->semester = 2;
                    } else {
                        $model->semester = 1;
                    }
                    if($request->Submit == 'simpan'){
                        $model->status = '5';

                    }else{
                        $model->status = '1';
                    } 
                    $model->tgl_submit = date('Y-m-d H:i:s');
                    $model->bayar = ($request->bayar / count($request->bulan));
                    $model->save();
                    $save = 'success';
                };
                // dd($save);
               if($save == 'success'){
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
        // dd(Session::all());
        if($request->has('Submit') and (Session::get('role') == 2 or Session::get('role') == 1)){
            setlocale(LC_MONETARY, 'id_ID');
            $tableData = DB::table('laporan_spp')->where('nisn = '.Session::get('nomor_induk'))->get();
            $periode;
            $row = [];
            $result;
            $x = 1;
            foreach($tableData as $row_value){
              $periode = $row_value->periode;
              $row[] .= '<tr>';
              $row[] .= '<td>'.$x.'</td>';
              $row[] .= '<td>'.$row_value->nisn.'</td>';
              $row[] .= '<td>'.$row_value->nama_siswa_text.'</td>';
              $row[] .= '<td>'.$row_value->jk.'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->januari))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->februari))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->maret))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->april))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->mei))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->juni))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->juli))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->agustus))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->september))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->oktober))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->november))).'</td>';
              $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->desember))).'</td>';
              $row[] .= '<tr>';
              $x++;
            }
        } else {
          setlocale(LC_MONETARY, 'id_ID');
          $tableData = DB::table('laporan_spp')->get();
          $periode;
          $row = [];
          $result;
          $x = 1;
          foreach($tableData as $row_value){
            $periode = $row_value->periode;
            $row[] .= '<tr>';
            $row[] .= '<td>'.$x.'</td>';
            $row[] .= '<td>'.$row_value->nisn.'</td>';
            $row[] .= '<td>'.$row_value->nama_siswa_text.'</td>';
            $row[] .= '<td>'.$row_value->jk.'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->januari))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->februari))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->maret))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->april))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->mei))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->juni))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->juli))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->agustus))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->september))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->oktober))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->november))).'</td>';
            $row[] .= '<td>'.str_replace(',','.',(number_format($row_value->desember))).'</td>';
            $row[] .= '<tr>';
            $x++;

          }
          $result = implode('', $row);
          $dataprint = [
            'result' => $result,
            'periode' => $periode
          ];
          // $pdf = PDF::loadView('templates.pages.print.laporan', $dataprint)->setPaper('a4', 'landscape');
          return view('templates.pages.print.laporan')->with($dataprint);
          // return $pdf->stream(date('j F Y').'laporan spp.pdf');
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
    public function edit($id, FormBuilder $builder, Request $request)
    {

        $process = $this->model->findById($id);
        $process->loadMissing('Konseptor', 'Siswa', 'Ot', 'Status', 'JabatanKonseptor', 'JabatanApprover');
        // dd($process->toArray());
         if($request->has('Submit')){
            if($request->has('_token')){
                $save = 'fail';
                foreach($request->bulan as $bulan){
                    $t = t::find($id);
                    $t->kode_transaksi = '4321';
                    $t->nama_siswa = $request->nama_siswa;
                    $t->step = '1';
                    $t->konseptor_nama = Session::get('id');
                    $t->konseptor_jabatan = Session::get('role');
                    $t->tgl_bayar = $request->tgl_bayar;
                    $t->bulan = $bulan;
                    $t->periode = $request->periode;
                    $t->tahun_ajaran = $request->tahun_ajaran;
                    if((int)$bulan <= 6){
                        $t->semester = 2;
                    } else {
                        $t->semester = 1;
                    }
                    if($request->Submit == 'simpan'){
                        $t->status = '5';

                    }else{
                        $t->status = '1';
                    }
                    $t->tgl_submit = date('Y-m-d H:i:s');
                    $t->bayar = ($request->bayar / count($request->bulan));
                    $save = $t->save();
                    $save;
                    if($save == 'fail'){
                        return redirect()->back();
                    } else {
                        return redirect(route('Status.index'));
                    }
                };
                // dd($save);
            }
        }
        $form = $builder->create(SppFormType::class, [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'POST',
            'url' => route('Semua.edit', ['Semua' => $id]),
            'model' => $process->toArray()
        ]);
        $data = [
            'rows' => $process,
            'form' => $form,
            'form_title' => 'Data Spp '.$process->Siswa->nama_siswa_text.' '. date('j F Y', strtotime($process->tgl_bayar)),
            'edit' => true
        ];
        return view('templates.pages.Spp.Add')->with($data);
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
        $query = t::destroy($id);
        return redirect(route('Draft.index'));
    }
}
