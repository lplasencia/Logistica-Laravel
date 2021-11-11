<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function __contruct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $supplier = Supplier::get();
        return view('supplier.index',compact('supplier'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|max:60',
            'representante' => 'required|max:60',
            'ruc' => 'required|numeric|digits:10',
            'direccion' => 'required|max:50',
            'telefono' => 'required|numeric|digits:9',
            'email' => 'required|max:50',
        ],
        [
            'nombre.required' => 'Ingrese el nombre',
            'nombre.max' => 'Ingrese solo 60 caracteres',
            'representante.required' => 'Ingrese el representante',
            'representante.max' => 'Ingrese solo 60 caracteres',
            'ruc.required' => 'Ingrese el ruc',
            'ruc.numeric' => 'Ingrese solo números',
            'ruc.digits' => 'Ingrese 10 números',
            'direccion.required' => 'Ingrese la dirección',
            'direccion.max' => 'Ingrese solo 50 caracteres',
            'telefono.required' => 'Ingrese el telefono',
            'telefono.numeric' => 'Ingrese solo números',
            'telefono.digits' => 'Ingrese solo 9 números',
            'email.required' => 'Ingrese el email',
            'email.max' => 'Ingrese solo 50 caracteres'
        ]);

        $supplier = new Supplier();
        $supplier->company_id = 1;
        $supplier->nombre = $request->nombre;
        $supplier->representante = $request->representante;
        $supplier->ruc = $request->ruc;
        $supplier->direccion = $request->direccion;
        $supplier->telefono = $request->telefono;
        $supplier->email = $request->email;
        $supplier->save();

        return redirect()->route('supplier.index')->with('datos', 'Proveedor Registrado Satisfactoriamente');

    }
    
    public function list()
    {
        $supplier = Supplier::get();
        return view('supplier.list',compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit',compact('supplier'));
    }

}