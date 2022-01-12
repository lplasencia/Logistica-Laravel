<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = "order_details";
    public $timestamps = false;

    protected $fillable = [
        'precio_venta','cantidad', 'order_id','entry_detail_id' 
    ];
}
