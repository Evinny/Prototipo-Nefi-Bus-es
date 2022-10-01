<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaConfirmadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_confirmadas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('nome', 200);
            $table->string('responsavel', 200);
            $table->string('cnpj', 25);
            $table->string('email', 200);
            $table->string('estado', 100);
            $table->string('telefone', 20);
            $table->string('tipo', 150);

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
        Schema::dropIfExists('empresa_confirmadas');
    }
}
