<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class familias extends Model
{
    protected $table = 'familias';

    protected $fillable = ['code_f', 'code_l', 'nombre', 'descripcion'];
}
