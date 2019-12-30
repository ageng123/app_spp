<?php

namespace App\Http\Controllers\master_data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jurusan;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\JurusanFormType;

class MasterJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'row' => Jurusan::all()
        ];
        return view('templates.pages.MasterData.MasterJurusan')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $builder, Request $request)
    {
        $jurusanModel = new Jurusan;
        $form = $builder->create(JurusanFormType::class, [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'POST',
            'url' => route('jurusan.create')
        ]);
        if($request->has('Submit')){
            if(isset($request->_token)){
                $jurusanModel->jurusan_text = $request->jurusan_text;
                $save = $jurusanModel->save();
                return $save ? redirect(route('jurusan.index'))->with('message', 'Data Jurusan Berhasil Ditambahkan') : redirect()->back()->with('message', $request->jurusan_text." Gagal Ditambahkan ") ;
            }
        } else {
            $data = [
                'form' => $form,
                'form_title' => 'Tambah Master Data Jurusan',
                'edit' => false
            ];
            return view('templates.pages.MasterData.AddMasterJurusan')->with($data);
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
        $jurusanModel = Jurusan::findOrfail($id);
        $data = [
            'data' => $jurusanModel,
            'form_title' => 'Preview Master Data Jurusan',

        ];
        return view('templates.pages.MasterData.PreviewMasterJurusan')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $builder)
    {
        $loadModel = Jurusan::findOrfail($id);
        $form = $builder->create(JurusanFormType::class,
        [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'PUT',
            'url' => route('jurusan.update', ['jurusan' => $id]),
            'model' => $loadModel->toArray()
        ]
    );
        $data = [
            'form' => $form,
            'form_title' => 'Edit Data Master Jurusan',
            'edit' => true
        ];
        return view('templates.pages.MasterData.AddMasterJurusan')->with($data);
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
        $loadModel = Jurusan::findOrfail($id);
        if($request->has('_token'))
            $loadModel->jurusan_text = $request->jurusan_text;
            $save = $loadModel->save();
            return $save ? redirect(route('jurusan.index'))->with('message', 'Data Jurusan Berhasil Diupdate') : redirect()->back()->with('Jurusan Id : ', $id.", Gagal Diupdate ") ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $save = Jurusan::destroy($id);
        return $save ? redirect(route('jurusan.index'))->with('message', 'Data Jurusan Berhasil Dihapus') : redirect()->back()->with('Jurusan Id : ', $id.", Gagal Dihapus ") ;

    }
}
