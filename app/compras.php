<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compras extends Model
{
    protected $table = 'compras';

    protected $fillable = [
        'tipodte',
        'folio',
        'fchingres',
        'fchemis',
        'fchvenc',
        'prov_id',
        'subtotal',
        'mntneto',
        'desc',
        'rasaiva',
        'iva',
        'mnttotal',
        'abono',
        'fmapago',
        'estado',
        'fchapago'
    ];
   
}
