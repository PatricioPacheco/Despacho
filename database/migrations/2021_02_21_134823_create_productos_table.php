<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proveedor_id')->unsigned()->nullable();
            $table->integer('seccion_id')->unsigned()->nullable();
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->integer('estante_id')->unsigned()->nullable();
            $table->integer('nivel_id')->unsigned()->nullable();
            $table->string('nombre_producto')->nullable();
            $table->string('codigo_producto')->unique()->nullable();
            $table->float('peso_producto')->nullable();
            $table->integer('stock_producto')->nullable();
            $table->string('estado_producto')->default('Disponible')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_caducidad')->nullable();
            $table->string('observacion_producto')->nullable();
            $table->timestamps();

             /** id_seccion **/
            /** id_categoria **/
            /** id_estante **/
            /** id_nivel **/

            $table->foreign('proveedor_id')->references('id')->on('proveedores')
            ->onDelete('cascade');

            $table->foreign('seccion_id')->references('id')->on('secciones')
            ->onDelete('cascade');

            $table->foreign('categoria_id')->references('id')->on('categorias')
            ->onDelete('cascade');

            $table->foreign('estante_id')->references('id')->on('estantes')
            ->onDelete('cascade');

            $table->foreign('nivel_id')->references('id')->on('niveles')
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
        Schema::dropIfExists('productos');
    }
}
