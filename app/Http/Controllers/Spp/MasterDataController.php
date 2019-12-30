<?php

namespace App\Http\Controllers\SPP;

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
        $data = [
            'row' => $rows
        ];
        return view('templates.pages.Spp.Approved')->with($data);
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
    public function show($id)
    {
        //
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
        //
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
