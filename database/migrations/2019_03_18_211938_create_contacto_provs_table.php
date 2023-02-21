<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoProvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_prov', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prov_id');
            $table->string('nombre');
            $table->string('cargo')->nullable();
            $table->string('fono', 50)->nullable();
            $table->string('celular', 50)->nullable();
            $table->string('WhatsApp', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('nota')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('contacto_prov');
    }
}
