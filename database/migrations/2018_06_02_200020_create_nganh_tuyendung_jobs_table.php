<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNganhTuyendungJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nganh_tuyendung_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nganh_id');
            $table->integer('tuyendung_job_id');
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
        Schema::dropIfExists('nganh_tuyendung_jobs');
    }
}
