<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateNganhsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('nganhs', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('linh_vuc_id');
                $table->string('ten_nganh');
                $table->foreign('linh_vuc_id')
                    ->references('id')
                    ->on('linh_vucs')
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
            Schema::dropIfExists('nganhs');
        }
    }
