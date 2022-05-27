<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('anwser');
            $table->timestamps();
        });

        Schema::table('posts', function($table)
        {
            $table->string('owner');
            $table->foreign('owner')
                        ->references('cne')
                        ->on('membres')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');


            $table->string('id_post');
            $table->foreign('id_post')
                        ->references('id')
                        ->on('posts')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}