<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
                            'rut',
                            'nombre',
                            'direccion',
                            'pais',
                            'region', 
                            'ciudad',
                            'comuna',
                            'giro',
                            'celular',
                            'fono', 
                            'email',
                            'url',
                            'descto',
                            'deuda_factura',
                            'deuda_guia',
                            'tope',
                            'credito',
                            'cheque',
                            'real_desc',
                            'mandato'
                        ];
}
