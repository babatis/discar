<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class precio_ventas extends Model
{
    protected $table = 'precio_ventas';
    protected $fillable = [ 
                            'prod_id',
                            'prov_id',
                            'nfactura',
                            'detalle',
                            'pcosto',
                            'cantidad',
                            'desct1',
                            'desct2',
                            'flete',
                            'costotot',
                            'p1_neto',
                            'p1_iva',
                            'p1_venta',
                            'p2_neto',
                            'p2_iva',
                            'p2_venta',
                            'p3_neto',
                            'p3_iva',
                            'p3_venta',
                            'activo',
                         ];
}



