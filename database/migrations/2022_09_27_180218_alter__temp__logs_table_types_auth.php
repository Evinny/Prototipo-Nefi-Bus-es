<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTempLogsTableTypesAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temp_logs', function (Blueprint $table) {
            $table->dropcolumn('auth_inscrito');
            $table->dropcolumn('auth_empresa');
            $table->dropcolumn('auth_adm');

            $table->string('auth_inscrito', 20);
            $table->string('auth_empresa', 20);
            $table->string('auth_adm', 20);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('temp_logs', function(blueprint $table){
            $table->dropcolumn('auth_inscrito');
            $table->dropcolumn('auth_empresa');
            $table->dropcolumn('auth_adm');
            
            $table->boolean('auth_inscrito');
            $table->boolean('auth_empresa');
            $table->boolean('auth_adm');
        });
    }
}
