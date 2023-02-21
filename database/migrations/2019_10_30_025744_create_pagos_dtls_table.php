<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_dtls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pagos_id');
            $table->integer('tipopago');
            $table->string('folio');
            $table->decimal('total', 10, 2);
            $table->date('fcha_pago');
            $table->integer('banco')->nullable();
            $table->string('cta_cte')->nullable();
            $table->string('titular')->nullable();
            $table->integer('tipotarjeta')->nullable();
            $table->integer('cuotas')->nullable();
            $table->string('depsbanco')->nullable();
            $table->string('depsctacte')->nullable();
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
        Schema::dropIfExists('pagos_dtls');
    }
}
