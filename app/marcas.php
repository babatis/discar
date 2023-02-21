<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marcas extends Model
{
    
    protected $table = 'marcas';
    protected $fillable = ['code_m', 'nombre', 'descripcion'];
    
}
