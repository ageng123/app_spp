<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SppSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp_siswa', function(Blueprint $add){
            $add->bigIncrements('id');
            $add->bigInteger('nisn');
            $add->string('nama_siswa_text');
            $add->string('tpt_lahir');
            $add->date('tgl_lahir');
            $add->string('alamat');
            $add->string('jk');
            $add->bigInteger('jurusan')->nullable();
            $add->bigInteger('kelas')->nullable();
            $add->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
