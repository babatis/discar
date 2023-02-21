<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta_dtl extends Model
{
    protected $table = 'venta_dtls';

    protected $fillable = [
        'venta_id',
        'item',
        'idprod',
        'pcosto',
        'cantidad',
        'precio',
        'monto',
        'created_at',
        'updated_at'
    ];
}
