<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuyendungJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyendung_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employer_id');
            $table->string('ten_cong_viec');
            $table->text('gia_tri_cong_viec');
            $table->text('thoi_gian_bao_gia');
            $table->text('thoi_gian_thuc_hien');
            $table->integer('dia_diem_uu_tien');
            $table->integer('von_dieu_le');
            $table->integer('so_nam_kinh_nghiem');
            $table->string('loai_hinh_doanh_nghiep');
            $table->text('nhan_su');
            $table->text('thiet_bi');
            $table->text('chi_tiet_cong_viec');
            $table->text('yeu_cau_cong_viec');
            $table->text('phuc_loi_cong_viec');
            $table->text('yeu_cau_ho_so_dinh_kem');
            $table->string('attach_spec');
            $table->string('attach_boq');
            $table->string('attach_ban_ve_ket_cau');
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
        Schema::dropIfExists('tuyendung_jobs');
    }
}
