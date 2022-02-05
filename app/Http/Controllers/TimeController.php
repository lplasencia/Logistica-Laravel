<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;

class TimeController extends Controller
{
    public function producto(Request $request)
    {
        //Ver quien es mayor
        $minicio = substr($request->fechaini,3,2);
        $mfinal = substr($request->fechafin,3,2);
        $minicio = (int)$minicio;
        $mfinal = (int)$mfinal;
        if($minicio == $mfinal)
        {
            $inicio = substr($request->fechaini,6,11);
            $final = substr($request->fechafin,6,11);
            $inicio = (float)$inicio;
            $final = (float)$final;
            $resultado = $final - $inicio;
        }
        else
        {
            $inicio = substr($request->fechaini,6,11);
            $final = substr($request->fechafin,6,11);
            $inicio = (float)$inicio;
            $final = (float)$final;
            $final = $final + 60;
            $resultado = $final - $inicio;
        }

        $time = new Time();
        $time->descripcion = 'Tiempo Busqueda Producto';
        $time->inicial = $request->fechaini;
        $time->final = $request->fechafin;
        $time->resultado = $resultado;
        $time->save();

        return redirect()->route('home')->with('datos', 'Tiempo Registrado');

    }

    public function venta(Request $request)
    {
        //Ver quien es mayor
        $minicio = substr($request->fechaini,3,2);
        $mfinal = substr($request->fechafin,3,2);
        $minicio = (int)$minicio;
        $mfinal = (int)$mfinal;
        if($minicio == $mfinal)
        {
            $inicio = substr($request->fechaini,6,11);
            $final = substr($request->fechafin,6,11);
            $inicio = (float)$inicio;
            $final = (float)$final;
            $resultado = $final - $inicio;
        }
        else
        {
            $inicio = substr($request->fechaini,6,11);
            $final = substr($request->fechafin,6,11);
            $inicio = (float)$inicio;
            $final = (float)$final;
            $final = $final + 60;
            $resultado = $final - $inicio;
        }

        $time = new Time();
        $time->descripcion = 'Tiempo Reporte Venta';
        $time->inicial = $request->fechaini;
        $time->final = $request->fechafin;
        $time->resultado = $resultado;
        $time->save();

        return redirect()->route('home')->with('datos', 'Tiempo Registrado');
    }

    public function index()
    {
        $time = Time::get();
        return view('reporte.tiempos.index',compact('time'));
    }
}
