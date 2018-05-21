<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuyendungInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyendung_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tencongty');
            $table->integer('diachi_tp');
            $table->string('diachicuthe');           
            $table->string('dienthoai');            
            $table->string('website');
            $table->text('gioithieu');
            $table->string('avata');
            $table->unsignedInteger('tuyendung_id');
            $table->foreign('tuyendung_id')->references('id')->on('tuyendung_users');
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
        Schema::dropIfExists('tuyendung_infos');
    }
}
