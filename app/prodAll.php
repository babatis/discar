<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodAll extends Model
{
    protected $table = 'prod_allv';
    // protected $guarded = [];

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCodInterno($query, $cod)
    {
        if($cod)
            return $query->where('codinterno', 'LIKE', "%".$cod."%");
    }
    
    public function scopeBarcode($query, $bar)
    {
        if($bar)
            return $query->where('barcode', 'LIKE', "%".$bar."%");
    }

    public function scopeNombre($query, $name)
    {
        if($name)
            return $query->where('nombre', 'LIKE', "%".$name."%");
    }
}
