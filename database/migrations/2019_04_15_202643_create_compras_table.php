<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipodte');
            $table->integer('folio');
            $table->date('fchingres');
            $table->date('fchemis');
            $table->date('fchvenc');
            $table->integer('prov_id');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('mntneto', 10, 2);
            $table->decimal('desc', 10, 2);
            $table->decimal('tasaiva', 10, 2);
            $table->decimal('iva', 10, 2);
            $table->decimal('mnttotal', 10, 2);
            $table->decimal('abono', 10, 2)->nullable();
            $table->string('fmapago')->nullable();
            $table->enum('estado', ['IMP', 'PAG', 'NULA'])->nullable();
            $table->date('fchapago')->nullable();
            $table->integer('tdteref')->nullable();
            $table->integer('folioref')->nullable();
            $table->tinyInteger('codref')->nullable();
            $table->text('razonref')->nullable();
            $table->text('nota')->nullable();
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
        Schema::dropIfExists('compras');
    }
}
