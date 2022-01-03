<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document_Type;

class DocumentController extends Controller
{
    public function index()
    {
        $documento = Document_Type::get();
        return view('mantenimiento.documento.index',compact("documento"));
    }

    public function create()
    {
        return view('mantenimiento.documento.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|max:60',
            'operacion' => 'required',
        ],
        [
            'nombre.required' => 'Ingrese el nombre',
            'nombre.max' => 'Ingrese solo 60 caracteres',
            'operacion.required' => 'Seleccione la operación',
        ]);

        $documento = new Document_Type();
        $documento->nombre = $request->nombre;
        $documento->operacion = $request->operacion;
        $documento->save();

        return redirect()->route('documento.index')->with('datos', 'Documento Registrado Satisfactoriamente');
    }
}
