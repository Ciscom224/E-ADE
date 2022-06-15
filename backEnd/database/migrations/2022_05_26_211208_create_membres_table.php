<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->string('cne',10)->unique();
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('filiere',20);
            $table->string('level',30);
            $table->boolean('is_validate')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->string('password',100);
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
        Schema::dropIfExists('membres');
    }
}
