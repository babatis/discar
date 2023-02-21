<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXmldtesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xmldtes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codinterno')->nullable();
            $table->string('nombre')->nullable();
            $table->decimal('cantidad', 10, 2)->nullable();
            $table->decimal('precio', 10, 2)->nullable();
            $table->decimal('monto', 10, 2)->nullable();
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
        Schema::dropIfExists('xmldtes');
    }
}
