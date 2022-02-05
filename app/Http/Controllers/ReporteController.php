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
use PDF;

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

        // $rango = DB::select("SELECT MONTH(fecha) as 'mes' FROM `sales` WHERE fecha BETWEEN $inicio AND '$fin'");

        $array = ["Enero","Febrero","Marzo","Abril","Mayo","Junio"];

        return view('reporte.ventas.vista',compact('inicio','fin'));

        return $rango;
    }
    //Recibe las fechas de inicio y fin
    public function info($ini,$fin)
    {
        $valor = DB::select("SELECT MONTH(fecha) as 'mes', SUM(total) as 'total' FROM `sales` 
        WHERE fecha BETWEEN '$ini' AND '$fin'
        GROUP BY MONTH(fecha)");

        $meses = [];
        $totales = [];

        //Transformando numeros de mes en letra
        foreach($valor as $item)
        {
            switch ($item->mes) {
                case 1:
                    array_push($meses,"Enero");
                    break;
                case 2:
                    array_push($meses,"Febrero");
                    break;
                case 3:
                    array_push($meses,"Marzo");
                    break;
                case 4:
                    array_push($meses,"Abril");
                    break; 
                case 5:
                    array_push($meses,"Mayo");
                    break;
                case 6:
                    array_push($meses,"Junio");
                    break; 
                case 7:
                    array_push($meses,"Julio");
                    break;
                case 8:
                    array_push($meses,"Agosto");
                    break;
                case 9:
                    array_push($meses,"Septiembre");
                    break;
                case 10:
                    array_push($meses,"Octubre");
                    break;
                case 11:
                    array_push($meses,"Noviembre");
                    break; 
                case 12:
                    array_push($meses,"Diciembre");
                    break;
            }
            
        }

        //Rellenar el array con los totales
        foreach($valor as $item)
        {
            array_push($totales,$item->total);
        }

        $array = array_merge($meses,$totales);

        return $array;

    }

    public function fecha($fechaini)
    {
        return view('reporte.ventas.fecha',compact('fechaini'));
    }

    //Index para mostrar el registro de venta diaria
    public function index2(Request $request)
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $valor = DB::select("SELECT p.id ,p.nombre, od.precio_venta, SUM(od.cantidad) AS 'cantidad' ,SUM(od.precio_venta * od.cantidad) AS 'subtotal' FROM sales s 
            INNER JOIN orders o 
            ON s.order_id = o.id
            INNER JOIN order_details od
            ON o.id = od.order_id
            INNER JOIN entry_details ed
            ON od.entry_detail_id = ed.id
            INNER JOIN products p
            ON ed.product_id = p.id
            WHERE s.fecha = '$request->date'
            GROUP BY p.id,od.precio_venta ");

        $total = DB::select("SELECT SUM(od.precio_venta * od.cantidad) AS 'total' FROM sales s 
        INNER JOIN orders o 
        ON s.order_id = o.id
        INNER JOIN order_details od
        ON o.id = od.order_id
        WHERE s.fecha = '$request->date'
        GROUP BY od.precio_venta "); 

        $fechaini = $request->fechaini;

        return view('reporte.ventas.index2',compact('valor','date','total','fechaini'));
    }

    public function ventadiaria($date)
    {

        $valor = DB::select("SELECT p.id ,p.nombre, od.precio_venta, SUM(od.cantidad) AS 'cantidad' ,SUM(od.precio_venta * od.cantidad) AS 'subtotal' FROM sales s 
            INNER JOIN orders o 
            ON s.order_id = o.id
            INNER JOIN order_details od
            ON o.id = od.order_id
            INNER JOIN entry_details ed
            ON od.entry_detail_id = ed.id
            INNER JOIN products p
            ON ed.product_id = p.id
            WHERE s.fecha = '$date'
            GROUP BY p.id,od.precio_venta ");

        $total = DB::select("SELECT SUM(od.precio_venta * od.cantidad) AS 'total' FROM sales s 
        INNER JOIN orders o 
        ON s.order_id = o.id
        INNER JOIN order_details od
        ON o.id = od.order_id
        WHERE s.fecha = '$date'
        GROUP BY od.precio_venta ");

        $pdf = PDF::loadView('reporte.ventas.ventadiaria',compact('date','valor','total'));
        return $pdf->stream();
        
        // return view('reporte.ventas.ventadiaria',compact('date','valor','total'));
    }

}
