<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTuyendungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_tuyendungs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tencongty');
            $table->integer('idquymo')->unsigned();
            $table->foreign('idquymo')->references('id')->on('quymocongties');
            $table->string('diachi');
            $table->string('dienthoai');            
            $table->string('namthanhlap');
            $table->text('gioithieu');
            $table->string('avata');
            $table->integer('idtuyendung')->unsigned();
            $table->foreign('idtuyendung')->references('id')->on('tuyendungs')->onDelete('cascade');
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
        Schema::dropIfExists('info_tuyendungs');
    }
}
