<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->string('id_formation')->unique();
            $table->string('subject',50);
            $table->string('teacher',40);
            $table->integer('limit_number');
            $table->boolean('is_certificat');
            $table->text('description');
            $table->string('url_image',30);
            $table->date('dat_e');
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
        Schema::dropIfExists('formations');
    }
}