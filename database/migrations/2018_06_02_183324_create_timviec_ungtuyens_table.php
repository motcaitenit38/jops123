<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimviecUngtuyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timviec_ungtuyens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timviec_cv_id');
            $table->integer('tuyendung_job_id');
            $table->integer('gia_chao');
            $table->text('bien_phap_thi_cong');
            $table->string('file_dinh_kem');
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
        Schema::dropIfExists('timviec_ungtuyens');
    }
}
