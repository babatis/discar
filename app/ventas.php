<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    protected $table = 'ventas';

    protected $fillable = [
        'cliente_id',
        'neto',
        'tasa_iva',
        'iva',
        'desc',
        'total',
        'total_real',
        'abono',
        'fmapago',
        'estado',
        'despacho',
        'fchapago',
        'created_at',
        'updated_at'

    ];
}
