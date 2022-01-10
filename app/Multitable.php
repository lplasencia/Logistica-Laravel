<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multitable extends Model
{
    protected $table = "multitable";
    public $timestamps = false;

    protected $fillable = [
        'nombre_impuesto','porcentaje_impuesto', 'simbolo_moneda'
    ];
}
