<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
   
    protected $table = 'proveedores';
    // protected $primaryKey = 'prov_id';
    protected $fillable = [ 
                            'rut',
                            'nombre',
                            'giro',
                            'direccion',
                            'ciudad', 
                            'comuna', 
                            'pais', 
                            'zipecode', 
                            'fono', 
                            'email', 
                            'plazo_pago', 
                            'observacion', 
                            'memo'
                        ];

}
