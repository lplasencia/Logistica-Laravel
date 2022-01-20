<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Multitable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Entry_detail;
use App\Order_Detail;
use DB;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reporte.ventas.index');
    }

    public function mostrar(Request $request)
    {
        //Recogiendo las fechas de ingreso
        $inicio = $request->inicio;
        $fin = $request->fin;

        $rango = DB::select("SELECT MONTH(fecha) as 'mes' FROM `sales` WHERE fecha BETWEEN $inicio AND '$fin'");

        

        return $rango;
    }

}
