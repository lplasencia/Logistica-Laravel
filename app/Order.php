<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    public $timestamps = false;

    protected $fillable = [
        'tipo_pedido','fecha', 'estado','user_id','customer_id','company_id' 
    ];
}
