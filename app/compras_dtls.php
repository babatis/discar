<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compras_dtls extends Model
{
    protected $table = 'compras_dtls';

    protected $fillable = [
        'compra_id',
        'item',
        'prod_id',
        'nombre',
        'pcosto',
        'cantidad',
        'dsct1',
        'precio',
        'monto'
    ];
}
