<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table = 'productos';
    protected $guarded = ['id'];
    // protected $fillable = [ 
    //                         'slug',    
    //                         'codinterno',
    //                         'barcode',
    //                         'nombre',
    //                         'descripcion', 
    //                         'linea', 
    //                         'familia', 
    //                         'marca',
    //                         'unidad',
    //                         'imagen',
    //                         'cantidad',
    //                         'activo'
    //                      ];


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
