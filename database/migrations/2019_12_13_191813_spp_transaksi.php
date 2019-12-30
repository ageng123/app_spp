<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SppTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp_transaksi', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('refid')->nullable();
            $table->string('kode_transaksi')->nullable();
            $table->bigInteger('bayar');
            $table->string('nama_siswa');
            $table->string('nama_orangtua');
            $table->integer('step');
            $table->string('konseptor_nama');
            $table->string('konseptor_jabatan');
            $table->string('approver_nama');
            $table->string('approver_jabatan');
            $table->date('tgl_bayar');
            $table->string('bulan');
            $table->string('periode');
            $table->string('tahun_ajaran');
            $table->bigInteger('status');
            $table->timestamp('tgl_submit');
            $table->timestamp('tgl_approve');
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
