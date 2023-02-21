<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id'); //agregar familia ya que no esta consecutivas
            $table->string('rut', 10);
            $table->string('nombre');
            $table->string('giro', 255)->nullable();
            $table->string('direccion')->nullable();
            $table->string('comuna', 100)->nullable();
            $table->string('ciudad',100)->nullable();
            $table->string('pais', 100)->nullable();
            $table->string('zipecode')->nullable();
            $table->string('fono', 100)->nullable();
            $table->string('email', 150)->nullable();
            $table->integer('plazo_pago')->nullable();
            $table->text('observacion')->nullable();
            $table->text('memo')->nullable();
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
        Schema::dropIfExists('proveedores');
    }
}
