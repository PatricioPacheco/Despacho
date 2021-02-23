<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespachosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('empaquetado_id')->unsigned();
            $table->integer('transporte_id')->unsigned();
            $table->datetime('fecha_despacho');
            $table->timestamps();
            
            /** id_cliente **/
            /** id_transporte **/
            /** id_empaques **/

            $table->foreign('cliente_id')->references('id')->on('clientes')
            ->onDelete('cascade');

            $table->foreign('empaquetado_id')->references('id')->on('empaques')
            ->onDelete('cascade');

            $table->foreign('transporte_id')->references('id')->on('transportes')
            ->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despachos');
    }
}
