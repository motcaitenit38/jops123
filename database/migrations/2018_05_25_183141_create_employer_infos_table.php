<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employer_id');
            $table->foreign('employer_id')->references('id')->on('employers');
            $table->string('company_name');
            $table->string('website');
            $table->string('phone');
            $table->string('address');
            $table->text('description');
            $table->string('logo');
            $table->string('cover');
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
        Schema::dropIfExists('employer_infos');
    }
}
