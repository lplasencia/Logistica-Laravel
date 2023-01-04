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

    public function cantidad_mensual()
    {
        $productos = DB::select("SELECT p.id, p.nombre, p.descripcion, SUM(od.cantidad) as 'cantidad' FROM order_details od
        INNER JOIN entry_details ed
        ON od.entry_detail_id = ed.id
        INNER JOIN products p
        ON ed.product_id = p.id
        INNER JOIN orders o
        ON od.order_id = o.id
        INNER JOIN sales s 
        ON s.order_id = o.id
        WHERE MONTH(s.fecha) = MONTH(CURRENT_DATE) AND  YEAR(s.fecha) = YEAR(CURRENT_DATE)
        GROUP BY p.nombre,p.id,p.descripcion
        ORDER BY SUM(od.cantidad) DESC");

        $clientes = DB::select("SELECT c.id, c.nombre, c.email, c.telefono, COUNT(o.id) AS 'cantidad' FROM orders o 
        INNER JOIN customers c 
        ON o.customer_id = c.id
        INNER JOIN sales s 
        ON s.order_id = o.id
        WHERE MONTH(s.fecha) = MONTH(CURRENT_DATE) AND  YEAR(s.fecha) = YEAR(CURRENT_DATE)
        GROUP BY c.nombre, c.email, c.telefono, c.id
        ORDER BY COUNT(o.id) DESC;");

        return view('reporte.productos.index',compact('productos','clientes'));
    }

    public function ver($id){
        $detalle = DB::select("SELECT p.id, p.nombre, p.descripcion, SUM(od.cantidad) as 'cantidad' FROM order_details od
        INNER JOIN entry_details ed
        ON od.entry_detail_id = ed.id
        INNER JOIN products p
        ON ed.product_id = p.id
        INNER JOIN orders o
        ON od.order_id = o.id
        INNER JOIN sales s 
        ON s.order_id = o.id
        INNER JOIN customers c 
        ON o.customer_id = c.id
        WHERE MONTH(s.fecha) = MONTH(CURRENT_DATE) AND  YEAR(s.fecha) = YEAR(CURRENT_DATE) AND c.id = $id
        GROUP BY p.nombre,p.id,p.descripcion
        ORDER BY SUM(od.cantidad) DESC");

        $cliente = Customer::findOrFail($id);

        return view('reporte.productos.ver',compact('detalle','cliente'));
    }

}
