<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lineas extends Model
{
    
    protected $table = 'lineas';
    protected $fillable = ['code_l', 'nombre', 'descripcion'];

}
