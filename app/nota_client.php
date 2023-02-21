<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nota_client extends Model
{
    protected $table = 'nota_clients';
    // protected $guarded = [];

    protected $fillable = [
                            'prov_id',
                            'titulo',
                            'nota',
                            'updated_at'
                        ];
}
