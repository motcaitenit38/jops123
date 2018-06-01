<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiHinhDoanhNghiepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_hinh_doanh_nghieps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenloaihinhdoanhnghiep');
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
        Schema::dropIfExists('loai_hinh_doanh_nghieps');
    }
}
