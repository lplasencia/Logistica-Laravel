<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __contruct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $customer = Customer::get();
        return view('customer.index',compact('customer'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|max:60',
            'direccion' => 'required|max:50',
            'telefono' => 'required|numeric|digits:9',
            'email' => 'required|max:50',
        ],
        [
            'nombre.required' => 'Ingrese el nombre',
            'nombre.max' => 'Ingrese solo 60 caracteres',
            'direccion.required' => 'Ingrese la dirección',
            'direccion.max' => 'Ingrese solo 50 caracteres',
            'telefono.required' => 'Ingrese el telefono',
            'telefono.numeric' => 'Ingrese solo números',
            'telefono.digits' => 'Ingrese solo 9 números',
            'email.required' => 'Ingrese el email',
            'email.max' => 'Ingrese solo 50 caracteres'
        ]);

        $customer = new Customer();
        $customer->company_id = 1;
        $customer->nombre = $request->nombre;
        $customer->direccion = $request->direccion;
        $customer->telefono = $request->telefono;
        $customer->email = $request->email;
        $customer->save();

        return redirect()->route('customer.index')->with('datos', 'Cliente Registrado Satisfactoriamente');
    }
}
