<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return redirect()->route('auth.login');
});
Route::group(['prefix' => 'auth'], function(){
    Route::get('/login', function(){
        return view('templates.login');
    })->name('auth.login');
    Route::post('/check/{check}', 'CustomAuth\AuthController@auth')->name('auth.check');
});
Route::group(['prefix' => 'dashboard'], function(){
    Route::get('/home', function(){
        return view('templates.pages.home.home');
    })->name('auth.home')->middleware('check');
    
});
Route::group(['prefix' => 'masterdata', 'middleware' => ['check']], function(){
        // if(session('nisn') && session('jabatan')){
            Route::post('karyawan/create', 'Master_Data\MasterKaryawanController@create')->name('karyawan.create');
            Route::resource('karyawan','Master_Data\MasterKaryawanController');
            Route::post('kelas/create', 'Master_Data\MasterKelasController@create')->name('kelas.create');
            Route::resource('kelas','Master_Data\MasterKelasController');
            Route::post('role/create', 'Master_Data\MasterRoleController@create')->name('role.create');
            Route::resource('role','Master_Data\MasterRoleController');
            Route::post('siswa/create', 'Master_Data\MasterSiswaController@create')->name('siswa.create');
            Route::resource('siswa','Master_Data\MasterSiswaController');
            Route::post('jurusan/create', 'Master_Data\MasterJurusanController@create')->name('jurusan.create');
            Route::resource('jurusan','Master_Data\MasterJurusanController');
            Route::resource('mp','Master_Data\MasterPassword');
        // } else {
        //     return redirect('auth.login');
        // }
});
        Route::group(['prefix' => 'spp', 'middleware' => ['check']], function(){
        // if(session('nisn') && session('jabatan')){
        Route::resource('Semua','Spp\MasterDataController');
        Route::resource('Draft','Spp\DraftController');
        Route::resource('Status','Spp\StatusController');
        Route::resource('Approve','Spp\ApprovedController');
        Route::resource('Reject','Spp\RejectController');
        // } else {
        //     return redirect('auth.login');
        // }
});
