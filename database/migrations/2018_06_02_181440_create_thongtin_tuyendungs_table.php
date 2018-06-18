<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongtinTuyendungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtin_tuyendungs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employer_id');
            $table->string('ten_doanh_nghiep');
            $table->string('dien_thoai');
            $table->string('website');
            $table->integer('dia_diem_id');
            $table->string('dia_diem_cuthe');
            $table->string('ma_so_thue');
            $table->string('von_dieu_le');
            $table->date('nam_thanh_lap');
            $table->string('loai_hinh_doanh_nghiep');
            $table->text('gioi_thieu_cong_ty');
            $table->string('logo');
            $table->foreign('employer_id')
                ->references('id')
                ->on('employers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('thongtin_tuyendungs');
    }
}
