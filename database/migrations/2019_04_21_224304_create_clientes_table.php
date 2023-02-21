<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('rut')->unique();
            $table->string('nombre', 255);
            $table->string('negocio', 255)->nullable();
            $table->string('direccion')->nullable();
            $table->string('pais', 100)->nullable();
            $table->integer('region')->nullable();
            $table->integer('ciudad')->nullable();
            $table->integer('comuna')->nullable();
            $table->string('giro')->nullable();
            $table->string('celular', 15)->nullable();
            $table->string('fono', 15)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('url')->nullable();
            $table->decimal('descto', 10, 2)->nullable();
            $table->decimal('deuda_fact', 10, 2)->nullable();
            $table->decimal('deuda_guia', 10, 2)->nullable();
            $table->decimal('tope', 10, 2)->nullable();
            $table->boolean('credito')->nullable();
            $table->boolean('cheque')->nullable();
            $table->boolean('real_descto')->nullable();
            $table->boolean('mandato')->nullable();
            $table->tinyInteger('sector')->nullable();
            $table->string('dia')->nullable();
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
