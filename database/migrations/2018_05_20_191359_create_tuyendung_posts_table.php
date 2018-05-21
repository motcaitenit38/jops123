<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuyendungPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyendung_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tuyendung_user_id')->unsigned();
            $table->foreign('tuyendung_user_id')->references('id')->on('tuyendung_users');
            $table->string('tencongviec');
            $table->integer('noilamviec');
            $table->string('diachi');
            $table->integer('capbac_id')->unsigned();
            $table->foreign('capbac_id')->references('id')->on('capbacs');
            $table->integer('kinhnghiem_id')->unsigned();
            $table->foreign('kinhnghiem_id')->references('id')->on('kinhnghiems');
            $table->string('mucluong_tu');
            $table->string('mucluong_den');
            $table->integer('soluongtuyen');
            $table->date('time_nophoso');
            $table->text('motacongviec');
            $table->text('yeucaucongviec');
            $table->string('nguoilienhe');
            $table->string('email_nguoilienhe');
            $table->integer('trangthai')->default(0);
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
        Schema::dropIfExists('tuyendung_posts');
    }
}
