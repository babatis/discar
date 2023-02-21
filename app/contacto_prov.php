<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto_prov extends Model
{
    protected $table = 'contacto_prov';

    protected $fillable = ['prov_id', 'nombre', 'cargo', 'fono', 'celular', 'WahtApp', 'email', 'nota'];
}
