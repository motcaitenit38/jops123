<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateSeekerCvsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('seeker_cvs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name_cv');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->integer('address_id');
                $table->integer('academic_level_id');
                $table->integer('experience_id');
                $table->integer('form_work_id');
                $table->integer('position_id');
                $table->integer('career_id');
                $table->text('description');
                $table->string('attach_cv');
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
            Schema::dropIfExists('seeker_cvs');
        }
    }
