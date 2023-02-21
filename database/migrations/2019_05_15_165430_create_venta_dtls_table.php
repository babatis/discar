<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_dtls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venta_id');
            $table->integer('item');
            $table->integer('prod_id')->nullable();
            $table->string('codinterno')->nullable();
            $table->string('nombre');
            $table->decimal('pcosto', 10, 2)->nulleable();
            $table->decimal('cantidad', 10, 2);
            $table->decimal('dsct')->nullable();
            $table->decimal('precio', 10, 2);
            $table->decimal('monto', 10, 2);
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
        Schema::dropIfExists('venta_dtls');
    }
}
