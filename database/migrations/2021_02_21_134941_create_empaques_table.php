<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpaquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empaques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned()->unique();
            $table->string('orden_empaque')->unique();
            $table->integer('cantidad_producto');
            $table->integer('stock_actual')->nullable();
            $table->integer('Estado_emp')->nullable()->default(0);
            $table->timestamps();
            
            /** id_producto **/
            
            $table->foreign('producto_id')->references('id')->on('productos')
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
        Schema::dropIfExists('empaques');
    }
}
