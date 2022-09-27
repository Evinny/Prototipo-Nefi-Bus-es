<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTempLogsTableTokentoip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('temp_logs', function(blueprint $table){
            $table->dropcolumn('token');
            $table->string('ip', 30);
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
            $table->dropcolumn('ip');
            $table->string('token', 100);
        });
    }
}
