<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Multitable;
use App\Product;
use App\Entry_detail;

class VentaController extends Controller
{
    public function index()
    {
        $cliente = Customer::get();
        $multitable = Multitable::get();
        $producto = Product::get();
        return view('venta.salida.index',compact('cliente','multitable','producto'));
    }

    public function encontrarProducto($id)
    {
        $producto = Entry_detail::where('product_id','=',$id)->orderBy('id', 'desc')->first();   
        return $producto;
    }
}
