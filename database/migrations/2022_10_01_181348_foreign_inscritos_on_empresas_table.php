<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignInscritosOnEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        schema::table('inscritos', function(blueprint $table){
           $table->unsignedBigInteger('empresa_confirm_id')->nullable()->nullOnDelete();

            
            
        });
        schema::table('inscritos', function(blueprint $table){
            
 
            $table->foreign('empresa_confirm_id')->references('id')->on('empresa_confirmadas');
             
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->dropForeign('inscritos_empresa_confirm_id_foreign');
            $table->dropcolumn('empresa_confirm_id');
        });
    }
}
