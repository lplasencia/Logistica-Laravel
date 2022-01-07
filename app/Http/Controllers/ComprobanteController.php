<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document_Type;
use App\Company_Document_Detail;

class ComprobanteController extends Controller
{
    public function index()
    {
        $tipo = Company_Document_Detail::get();
        return view('venta.comprobante.index',compact('tipo'));
    }

    public function create()
    {
        $documento = Document_Type::get();
        return view('venta.comprobante.create',compact('documento'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'tipo' => 'required',
            'serie' => 'required',
            'numero' => 'required',
        ],
        [
            'tipo.required' => 'Ingrese el tipo de documento',
            'serie.required' => 'Ingrese la serie',
            'numero.required' => 'Ingrese el numero',
        ]);

        $detalle = new Company_Document_Detail();
        $detalle->ultima_serie = $request->serie;
        $detalle->ultimo_numero = $request->numero;
        $detalle->document_type_id = $request->tipo;
        $detalle->company_id = 1;
        $detalle->save();

        return redirect()->route('comprobante.index')->with('datos', 'Comprobante Registrado Satisfactoriamente');
    }
}
