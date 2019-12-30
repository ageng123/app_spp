<?php

namespace App\Http\Controllers\master_data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\KelasFormType;


class MasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'row' => Kelas::all()
        ];
        return view('templates.pages.MasterData.MasterKelas')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $builder, Request $request)
    {
        $kelasModel = new Kelas;
        $form = $builder->create(KelasFormType::class, [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'POST',
            'url' => route('kelas.create')
        ]);
        if($request->has('Submit')){
            if(isset($request->_token)){
                $kelasModel->kelas_text = $request->kelas_text;
                $save = $kelasModel->save();
                return $save ? redirect(route('kelas.index'))->with('message', 'Data Kelas Berhasil Ditambahkan') : redirect()->back()->with('message', $request->kelas_text." Gagal Ditambahkan ") ;
            }
        } else {
            $data = [
                'form' => $form,
                'form_title' => 'Tambah Master Data Kelas',
                'edit' => false
            ];
            return view('templates.pages.MasterData.AddMasterKelas')->with($data);
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
        $kelasModel = Kelas::findOrfail($id);
        $data = [
            'data' => $kelasModel,
            'form_title' => 'Preview Master Data Kelas'
        ];
        return view('templates.pages.MasterData.PreviewMasterKelas')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $builder)
    {
        $loadModel = Kelas::findOrfail($id);
        $form = $builder->create(KelasFormType::class,
        [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'PUT',
            'url' => route('kelas.update', ['kela' => $id]),
            'model' => $loadModel->toArray()
        ]
    );
        $data = [
            'form' => $form,
            'form_title' => 'Edit Data Master Kelas',
            'edit' => true
        ];
        return view('templates.pages.MasterData.AddMasterKelas')->with($data);
  
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
        try{
            if($request->has('_token')){
                $kelasModel = Kelas::findOrfail($id);
                $kelasModel->kelas_text = $request->kelas_text;
                $save = $kelasModel->save();
                return $save ? redirect(route('kelas.index'))->with('message', 'Data Kelas Berhasil Diupdate') : redirect()->back()->with('Kelas Id : ', $id.", Gagal Diupdate ") ;
                
            }
        } catch(expression $e){
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
        $var = Kelas::destroy($id);
        return $var ? redirect(route('kelas.index'))->with('message', 'Data Kelas Berhasil Dihapus') : redirect()->back()->with('Kelas Id : ', $id.", Gagal Dihapus ") ;
 
    }
}
