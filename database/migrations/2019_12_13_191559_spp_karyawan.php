<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SppKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp_karyawan', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('nik')->nullable();
            $table->string('nama_karyawan_text',100);
            $table->string('tpt_lahir',100);
            $table->date('tgl_lahir');
            $table->string('jk', 15);
            $table->longtext('alamat');
            $table->string('no_telp', 13);
            $table->timestamps();
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
