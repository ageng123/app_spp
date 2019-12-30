<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SppDetailUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp_detail_user', function(Blueprint $add){
            $add->bigIncrements('id');
            $add->bigInteger('nik')->nullable();
            $add->bigInteger('nisn')->nullable();
            $add->bigInteger('id_orangtua')->nullable();
            $add->bigInteger('id_user')->nullable();
            $add->bigInteger('role')->nullable();
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
