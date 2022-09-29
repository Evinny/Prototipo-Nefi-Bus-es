<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTemplogsResolveColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('temp_logs', function (blueprint $table){
            $table->string('resolveUser', 100)->nullable();
            $table->string('resolveSenha', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('temp_logs', function (blueprint $table){
            $table->dropcolumn('resolveUser');
            $table->dropcolumn('resolveSenha');
        });
    }
}
