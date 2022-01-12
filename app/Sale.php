<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";
    public $timestamps = false;

    protected $fillable = [
        'tipo_venta','tipo_comprobante','serie_comprobante','num_comprobante',
        'fecha','impuesto','total','estado','order_id','user_id'
    ];
}
