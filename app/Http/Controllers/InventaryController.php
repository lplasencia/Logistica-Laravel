<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Unit;

class InventaryController extends Controller
{
    public function entrada()
    {
        $product = Product::get();
        return view('inventario.entrada.index',compact('product'));
    }

    public function encontrarProducto($id)
    {
        $product = Product::find($id);
        $unit = Unit::find($product->unit_id);
        $array = [$product,$unit];
        
        return $array;
    }
}
