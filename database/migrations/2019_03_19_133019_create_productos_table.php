<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


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
            $table->string('slug')->unique();
            $table->string('codinterno')->unique();
            $table->string('barcode')->nullable();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('linea')->nullable();
            $table->string('familia')->nullable();
            $table->string('marca')->nullable();
            $table->string('unidad')->nullable();
            $table->string('imagen')->nullable();
            $table->decimal('cantidad', 10, 2)->nullable();
            $table->boolean('activo');
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
        Schema::dropIfExists('productos');
    }
}
