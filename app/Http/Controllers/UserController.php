<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Employee;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('mantenimiento.usuario.index',compact('user'));
    }

    public function create()
    {
        $empleado = Employee::get();
        return view('mantenimiento.usuario.create',compact('empleado'));
    }

    public function store(Request $request)
    {
        //La empresa es id 1
        //Administrador = 1   Empleado = 2

        $data = request()->validate([
            'empleado' => 'required',
            'tipo' => 'required'
        ],
        [
            'empleado.required' => 'Seleccione el trabajador',
            'tipo.required' => 'Seleccione el tipo de usuario'
        ]);

        //Trae al trabajador para el email y contraseña
        $empleado = Employee::findOrFail($request->empleado);

        //Logica para encontrar espacio
        $cadena = $empleado->nombre;
        $email = "";
        //Recorrer la cadena hasta encontrar un espacio
        for($i=0;$i<strlen($cadena);$i++)
        {
            if($cadena[$i] != " ")
                $email .= $cadena[$i];
            else
                break;
        }
        //Poner en minusculas y agregar el @alva.com
        $email = strtolower($email);
        $email .= "@alva.com"; 

        //Fecha actual
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        
        $user = new User();
        $user->name = $empleado->nombre;
        $user->email = $email;
        $user->password = Hash::make($empleado->dni);
        $user->employee_id = $request->empleado;
        $user->company_id = 1;
        $user->fecha_registro = $date;
        $user->tipo_usuario = $request->tipo;
        $user->save();

        return redirect()->route('usuario.index')->with('datos', 'Usuario Registrado Satisfactoriamente');
    }
}
