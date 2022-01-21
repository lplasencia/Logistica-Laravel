<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry_detail extends Model
{
    protected $table = "entry_details";
    public $timestamps = false;

    protected $fillable = [
        'stock_ingreso','stock_actual', 'precio_compra','precio_venta',
        'entry_id','product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
