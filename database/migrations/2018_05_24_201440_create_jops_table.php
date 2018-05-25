<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employer_id');
            $table->foreign('employer_id')->references('id')->on('employers');
            $table->string('jop_name');
            $table->integer('address_id');
            $table->integer('academic_level_id');
            $table->integer('experience_id');
            $table->integer('form_work_id');
            $table->integer('salary_level_id');
            $table->integer('position_id');
            $table->text('benefits');
            $table->text('jop_details');
            $table->text('jop_requirements');
            $table->date('deadline');
            $table->string('contact');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('jops');
    }
}
