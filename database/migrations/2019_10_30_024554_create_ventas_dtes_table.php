<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasDtesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_dtes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venta_id');
            $table->integer('client_id');
            $table->integer('tipodte');
            $table->integer('folio');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('mntneto', 10, 2);
            $table->decimal('desc', 10, 2);
            $table->decimal('tasaiva', 10, 2);
            $table->decimal('iva', 10, 2);
            $table->decimal('mnttotal', 10, 2);
            $table->decimal('abono', 10, 2)->nullable();
            $table->string('fmapago')->nullable();
            $table->enum('estado', ['IMP', 'PAG', 'NULA'])->nullable();
            $table->integer('tdteref')->nullable();
            $table->integer('folioref')->nullable();
            $table->tinyInteger('codref')->nullable();
            $table->text('razonref')->nullable();
            $table->text('nota')->nullable();
            $table->date('fchapago')->nullable();
            $table->date('fchemis')->nullable();
            $table->date('fchvenc')->nullable();
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
        Schema::dropIfExists('ventas_dtes');
    }
}
