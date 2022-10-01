<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmpresasUsuaSenhNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('empresas', function(blueprint $table){
            $table->DropColumn('usuario');
            $table->DropColumn('senha');
            
        });
        schema::table('empresas', function(blueprint $table){
            
            $table->string('usuario', 100)->nullable();
            $table->string('senha', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
