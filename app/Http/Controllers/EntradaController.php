<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Multitable;
use App\Company_Document_Detail;
use App\Product;
use App\Entry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Entry_detail;

class EntradaController extends Controller
{
    public function list()
    {
        $entrada = Entry::get();
        return view('compra.entrada.list',compact('entrada'));
    }

    public function ver($id)
    {
        $detalle = Entry_detail::where('entry_id','=',$id)->get();
        return view('compra.entrada.vista',compact('detalle'));
    }

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

        //La fecha actual
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        //Traer al usuario
        $user = Auth::user();

        //Registrar en la tabla Entries
        $entrada = new Entry();
        $entrada->tipo_comprobante = $request->comprobante;
        $entrada->serie_comprobante = $request->serie;
        $entrada->num_comprobante = $request->numero;
        $entrada->fecha = $date;
        $entrada->impuesto = $request->igv;
        $entrada->total = $request->total;
        $entrada->estado = "Aceptado";
        $entrada->supplier_id = $request->proveedor;
        $entrada->company_id = 1;
        $entrada->user_id = $user->id;
        $entrada->save();

        //Traer el ultimo registro de la ultima entrada
        $entrada = Entry::latest('id')->first();

        //Registrar los detalles de la entrada
        for($i = 0; $i < count($request->cod_producto); $i++)
        {
            //Traer info del producto
            $producto = Product::where('nombre','like',$request->cod_producto[$i])->get();
            $aux = Entry_detail::where('product_id','=',$producto[0]->id)->orderBy('id', 'desc')->first();
            //Comprobando si existe un stock actual
            if(is_null($aux)) //True si es nulo
            {
                //Sacando el stock actual
                //actual = ingreso
                $stock_actual = $request->cantidad[$i];
            } 
            else
            {
                //Sacando el stock actual
                //actual = anterior + ingreso
                $stock_actual = $aux->stock_actual + $request->cantidad[$i];
            }

            //Registrar detalle
            $detalle = new Entry_detail();
            $detalle->stock_ingreso = $request->cantidad[$i];
            $detalle->stock_actual = $stock_actual;
            $detalle->precio_compra = $request->pcompra[$i];
            $detalle->precio_venta = $request->pventa[$i];
            $detalle->entry_id = $entrada->id;
            $detalle->product_id = $producto[0]->id;
            $detalle->save();
        }

        return redirect()->route('home')->with('datos', 'Entrada Registrado Satisfactoriamente');

    }
}
