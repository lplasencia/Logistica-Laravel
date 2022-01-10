<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = "entries";
    public $timestamps = false;

    protected $fillable = [
        'tipo_comprobante','serie_comprobante', 'num_comprobante','fecha',
        'impuesto','total','estado','supplier_id','company_id','user_id' 
    ];
}
