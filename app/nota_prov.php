<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nota_prov extends Model
{
    protected $table = 'nota_prov';

    protected $fillable = [
                            'prov_id',
                            'titulo',
                            'nota',
                            'updated_at'
                          ];
}
