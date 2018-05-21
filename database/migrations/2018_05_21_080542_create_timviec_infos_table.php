<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimviecInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timviec_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timviec_user_id')->unsigned();
            $table->foreign('timviec_user_id')->references('id')->on('users');
            $table->string('hoten');
            $table->string('tieudehoso');
            $table->string('dienthoai');
            $table->integer('diadiemlamviec');
            $table->integer('capbac_id');
            $table->integer('kinhnghiem_id');
            $table->string('mucluongmongmuon');
            $table->text('gioithieu');
            $table->string('filedinhkem');
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
        Schema::dropIfExists('timviec_infos');
    }
}
