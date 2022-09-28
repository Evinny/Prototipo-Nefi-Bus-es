<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmpresasAndInscritosTableLogininfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('empresas', function(blueprint $table){
            $table->string('usuario', 100);
            $table->string('senha', 50);
            
        });
        schema::table('inscritos', function(blueprint $table){
            $table->string('usuario', 100);
            $table->string('senha', 50);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('inscritos', function(blueprint $table){
            $table->DropColumn('usuario');
            $table->DropColumn('senha');
            
        });
        schema::table('empresas', function(blueprint $table){
            $table->DropColumn('usuario');
            $table->DropColumn('senha');
            
        });
    }
}
