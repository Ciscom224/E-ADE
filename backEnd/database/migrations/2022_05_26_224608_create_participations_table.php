<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('participations', function($table)
        {
            $table->string('cne');
            $table->foreign('cne')
                        ->references('cne')
                        ->on('membres')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');


            $table->string('id_formation');
            $table->foreign('id_formation')
                    ->references('id_formation')
                    ->on('formations')
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
        Schema::dropIfExists('participations');
    }
}