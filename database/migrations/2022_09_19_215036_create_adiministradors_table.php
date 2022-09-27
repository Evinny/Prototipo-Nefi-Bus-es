<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdiministradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adiministradores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('usuario', 100);
            $table->string('senha', 50);
            $table->string('token', 50)->nullable();
            $table->string('função', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adiministradores');
    }
}
