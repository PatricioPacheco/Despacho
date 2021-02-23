<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('primer_nombre_cliente');
            $table->string('segundo_nombre_cliente')->nullable();
            $table->string('primer_apellido_cliente');
            $table->string('segundo_apellido_cliente')->nullable();
            $table->string('calle_principal_direccion');
            $table->string('calle_secundaria_direccion');
            $table->string('numero_direccion');
            $table->string('referencia_direccion');
            $table->string('email_cliente')->unique();
            $table->integer('numero_cliente');
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
        Schema::dropIfExists('clientes');
    }
}
