<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_dtls', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('compra_id');
            $table->integer('item');
            $table->string('prod_id')->nullable();
            $table->string('codinterno')->nullable();
            $table->string('nombre');          
            $table->decimal('pcosto', 10, 2);
            $table->decimal('cantidad', 10, 2);
            $table->decimal('dsct1', 10, 2)->nullable();
            $table->decimal('dsct2', 10, 2)->nullable();
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
        Schema::dropIfExists('compras_dtls');
    }
}
