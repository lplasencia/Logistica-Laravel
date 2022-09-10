<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::get();
        return view('mantenimiento.empleado.index',compact('employee'));
    }

    public function create()
    {
        return view('mantenimiento.empleado.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|max:60',
            'dni' => 'required|numeric|digits:8',
            'direccion' => 'required|max:50',
            'telefono' => 'required|numeric|digits:9',
            'email' => 'required|max:50',
            'fecha_nac'=> 'required'
        ],
        [
            'nombre.required' => 'Ingrese el nombre',
            'nombre.max' => 'Ingrese solo 60 caracteres',
            'dni.required' => 'Ingrese el DNI',
            'dni.numeric' => 'Ingrese solo números',
            'dni.digits' => 'Ingrese solo 8 números',
            'direccion.required' => 'Ingrese la dirección',
            'direccion.max' => 'Ingrese solo 50 caracteres',
            'telefono.required' => 'Ingrese el telefono',
            'telefono.numeric' => 'Ingrese solo números',
            'telefono.digits' => 'Ingrese solo 9 números',
            'email.required' => 'Ingrese el email',
            'email.max' => 'Ingrese solo 50 caracteres',
            'fecha_nac.required' => 'Ingrese fecha de nacimiento',
        ]);

        $empleado = new Employee();
        $empleado->nombre = $request->nombre;
        $empleado->dni = $request->dni;
        $empleado->direccion = $request->direccion;
        $empleado->telefono = $request->telefono;
        $empleado->email = $request->email;
        $empleado->fecha_nac = $request->fecha_nac;
        $empleado->save();

        return redirect()->route('empleado.index')->with('datos', 'Empleado Registrado Satisfactoriamente');

    }

    public function edit($id)
    {
        $empleado = Employee::FindOrFail($id);
        return view('mantenimiento.empleado.edit',compact('empleado'));
    }
}
