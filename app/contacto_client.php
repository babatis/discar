<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto_client extends Model
{
    
    protected $table = 'contacto_clients';
    // protected $guarded = [];
    protected $fillable = ['prov_id', 'nombre', 'cargo', 'fono', 'celular', 'WahtApp', 'email', 'nota'];
    
}
