<?php

namespace App\Http\Controllers\master_data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\RoleFormType;

class MasterRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'row' => Role::all()
        ];
        return view('templates.pages.MasterData.MasterRole')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $builder, Request $request)
    {
        $model = new Role;
        $form = $builder->create(RoleFormType::class, [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'POST',
            'url' => route('role.create')
        ]);
        if($request->has('Submit')){
            if(isset($request->_token)){
                $model->parent = $request->parent;
                $model->jabatan_text = $request->jabatan_text;
                $save = $model->save();
                return $save ? redirect(route('role.index'))->with('message', 'Data Kelas Berhasil Ditambahkan') : redirect()->back()->with('message', $request->jabatan_text." Gagal Ditambahkan ") ;
            }
        } else {
            $data = [
                'form' => $form,
                'form_title' => 'Tambah Master Data Jabatan',
                'edit' => false
            ];
            return view('templates.pages.MasterData.AddMasterRole')->with($data);
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
        $model = Role::findOrfail($id);
        $data = [
            'data' => $model,
            'form_title' => 'Preview Master Data Jabatan'
        ];
        return view('templates.pages.MasterData.PreviewMasterRole')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $builder)
    {
        $loadModel = Role::findOrfail($id);
        $form = $builder->create(RoleFormType::class,
        [
            'class' => 'uk-form-horizontal uk-grid',
            'method' => 'PUT',
            'url' => route('role.update', ['role' => $id]),
            'model' => $loadModel->toArray()
        ]
    );
        $data = [
            'form' => $form,
            'form_title' => 'Edit Data Master Jabatan',
            'edit' => true
        ];
        return view('templates.pages.MasterData.AddMasterRole')->with($data);
  
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
        $model = Role::findOrfail($id);
        if($request->has('_token')){
            $model->parent = $request->parent;
            $model->jabatan_text = $request->jabatan_text;
            $save = $model->save();
            return $save ? redirect(route('role.index'))->with('message', 'Data Role Berhasil Diupdate') : redirect()->back()->with('Role Id : ', $id.", Gagal Diupdate ") ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if($request->has('_token')){
            $save = Role::destroy($id);
            return $save ? redirect(route('role.index'))->with('message', 'Data Role Berhasil Dihapus') : redirect()->back()->with('Role Id : ', $id.", Gagal Dihapus ") ;
        }
    }
}
