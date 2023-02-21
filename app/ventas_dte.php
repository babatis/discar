<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventas_dte extends Model
{
    protected $table = 'ventas_dtes';

    protected $fillable = [
        'venta_id',
        'client_id',
        'tipodte',
        'folio',
        'subtotal',
        'mntneto',
        'desc',
        'tasaiva',
        'iva',
        'mnttotal',
        'abono',
        'fmapago',
        'estado',
        'tdteref',
        'folioref',
        'codref',
        'razonref',
        'fchapago',
        'fchemis',
        'fchvenc',
        'nota'
    ];
    
}
