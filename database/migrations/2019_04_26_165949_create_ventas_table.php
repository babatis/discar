<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('neto', 10, 2);
            $table->decimal('tasa_iva', 10, 2);
            $table->decimal('iva', 10, 2);
            $table->decimal('desc', 10, 2)->nullable();
            $table->decimal('total', 10, 2);
            $table->decimal('total_real', 10, 2);
            $table->decimal('abono', 10, 2)->nullable();
            $table->string('fmapago')->nullable();
            $table->text('nota')->nullable();
            $table->enum('estado', ['IMP', 'PAG', 'NULA'])->nullable();
            $table->enum('despacho', ['P', 'E'])->nullable();
            $table->date('fchapago')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
