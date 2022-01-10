<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Multitable;
use App\Company_Document_Detail;
use App\Product;

class EntradaController extends Controller
{
    public function index()
    {
        $proveedor = Supplier::get();
        $igv = Multitable::first();
        $comprobante = Company_Document_Detail::get();
        $producto = Product::get();
        return view('compra.entrada.index',compact('proveedor','igv','comprobante','producto'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'proveedor' => 'required',
            'total' => 'required',
            'comprobante' => 'required',
            'serie' => 'required|numeric',
            'numero' => 'required|numeric',
        ],
        [
            'proveedor.required' => 'Ingrese el proveedor',
            'comprobante.required' => 'Ingrese el comprobante',
            'serie.required' => 'Ingrese la serie',
            'serie.numeric' => 'Ingrese solo números',
            'numero.required' => 'Ingrese el número',
            'numero.numeric' => 'Ingrese solo números',
        ]);
        return $request->cod_producto[0];
    }
}
