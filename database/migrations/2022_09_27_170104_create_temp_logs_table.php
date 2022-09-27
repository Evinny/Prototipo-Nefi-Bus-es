<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_logs', function (Blueprint $table) {
            $table->id();
            $table->string('token', 100);
            $table->string('auth_inscrito', 30);
            $table->string('auth_empresa', 30);
            $table->string('auth_adm', 30);
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
        Schema::dropIfExists('temp_logs');
    }
}
