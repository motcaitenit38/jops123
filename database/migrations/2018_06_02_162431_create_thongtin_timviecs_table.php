<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateThongtinTimviecsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('thongtin_timviecs', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id');
                $table->string('ten_doanh_nghiep');
                $table->string('dien_thoai');
                $table->string('website');
                $table->integer('dia_diem_id');
                $table->string('dia_diem_cuthe');
                $table->string('ma_so_thue');
                $table->string('von_dieu_le');
                $table->date('nam_thanh_lap');
                $table->string('loai_hinh_doanh_nghiep');
                $table->string('dien_tich_quy_mo');
                $table->string('so_luong_day_chuyen');
                $table->string('tong_cong_suat');
                $table->string('file_dinh_kem_kinh_doanh');
                $table->string('file_dinh_kem_thong_tin_cong_ty');
                $table->text('gioi_thieu_cong_ty');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
            Schema::dropIfExists('thongtin_timviecs');
        }
    }
