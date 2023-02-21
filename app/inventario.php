<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = [ 
        'prod_id', 'codinterno', 'descripcion', 'cantidad'
     ];

    
}
