<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecioVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('precio_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('prod_id');
            $table->integer('prov_id')->nullable();
            $table->string('nfactura')->nullable();
            $table->string('detalle')->nullable();
            $table->decimal('pcosto', 10, 2);
            $table->decimal('desct1', 10, 2)->nullable();
            $table->decimal('desct2', 10, 2)->nullable();
            $table->decimal('flete', 10, 2)->nullable();
            $table->decimal('cantidad')->nullable();
            $table->decimal('costotot', 10, 2);
            $table->decimal('p1_neto', 10, 2)->nullable();
            $table->decimal('p1_iva', 10, 2)->nullable();
            $table->decimal('p1_venta', 10, 2)->nullable();
            $table->decimal('p2_neto', 10, 2)->nullable();
            $table->decimal('p2_iva', 10, 2)->nullable();
            $table->decimal('p2_venta', 10, 2)->nullable();
            $table->decimal('p3_neto', 10, 2)->nullable();
            $table->decimal('p3_iva', 10, 2)->nullable();
            $table->decimal('p3_venta', 10, 2)->nullable();
            $table->boolean('activo');
            $table->timestamps();
            $table->foreign('prod_id')->references('id')->on('productos')->onDelete('cascade');
            $table->index(['prov_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precio_ventas');
    }
}
