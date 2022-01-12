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

class PedidoController extends Controller
{
    public function index()
    {
        // $pedido = Order::where('tipo_pedido','=','Pedido')->get();
        $pedido = DB::select(
            "SELECT o.id, c.nombre, o.tipo_pedido, o.fecha, 
                ( SELECT SUM(d.precio_venta * d.cantidad)) as 'total' 
                    FROM orders o
                INNER JOIN order_details d
                ON o.id = d.order_id
                INNER JOIN customers c
                ON o.customer_id = c.id
                WHERE o.tipo_pedido = 'Pedido'
                GROUP BY o.id"
        );
        return view('venta.pedido.index',compact('pedido'));
    }

    public function create()
    {
        $cliente = Customer::get();
        $producto = Product::get();
        $multitable = Multitable::get();
        return  view('venta.pedido.create',compact('producto','cliente','multitable'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'cliente' => 'required',
            'pedido' => 'required'
        ],
        [
            'cliente.required' => 'Ingrese el cliente',
            'pedido.required' => 'Ingrese el tipo de pedido'
        ]);

        //Registrar como un pedido y su detalle

        //La fecha actual
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        //Traer al usuario
        $user = Auth::user();
        
        //Registrar el pedido
        $pedido = new Order();
        $pedido->tipo_pedido = "Pedido";
        $pedido->fecha = $date;
        $pedido->estado = "Registrado";
        $pedido->user_id = $user->id;
        $pedido->customer_id = $request->cliente;
        $pedido->company_id = 1;
        $pedido->save();

        //Traer el ultimo pedido registrado
        $pedido = Order::latest('id')->first();

        //Registrar los detalles
        for($i = 0; $i < count($request->cod_producto); $i++)
        {
            //Traer el id del producto
            $producto = Product::where('nombre','like',$request->cod_producto[$i])->get();
            //Traer el ultimo producto en el detalle de entrada
            $aux = Entry_detail::where('product_id','=',$producto[0]->id)->orderBy('id', 'desc')->first();

            $detalle = new Order_Detail();
            $detalle->precio_venta = $request->pventa[$i];    
            $detalle->cantidad = $request->cantidad[$i];
            $detalle->order_id = $pedido->id;
            $detalle->entry_detail_id = $aux->id;
            $detalle->save();

            //Restar la cantidad de producto
            $aux->stock_actual = $aux->stock_actual - $request->cantidad[$i];
            $aux->save();
        }

        //Variables que se van a enviar por la ruta
        // $igv = $request->igv;
        // $subtotal = $request->subtotal;
        // $total = $request->total;
        // $id = $pedido->id;

        return redirect()->route('pedido.index')->with('datos', 'Entrada Registrado Satisfactoriamente');


    }
}
