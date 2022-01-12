<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Multitable;
use App\Product;
use App\Entry_detail;
use App\Order;
use App\Order_Detail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Company_Document_Detail;
use DB;
use App\Sale;
use PDF;

class VentaController extends Controller
{
    public function list()
    {
        $venta = Sale::get();
        return view('venta.salida.list',compact('venta'));
    }

    public function index()
    {
        $cliente = Customer::get();
        $multitable = Multitable::get();
        $producto = Product::get();
        return view('venta.salida.index',compact('cliente','multitable','producto'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'cliente' => 'required'
        ],
        [
            'cliente.required' => 'Ingrese el cliente',
        ]);

        //Registrar como un pedido y su detalle

        //La fecha actual
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        //Traer al usuario
        $user = Auth::user();
        
        //Registrar el pedido
        $pedido = new Order();
        $pedido->tipo_pedido = "Proforma";
        $pedido->fecha = $date;
        $pedido->estado = "Pagado";
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

        $id = $pedido->id;

        return redirect()->route('venta.create',compact('id'))->with('datos', 'Entrada Registrado Satisfactoriamente');
    }

    //Recibe el id del pedido
    public function create($id)
    {

        //Traer al cliente
        $pedido = Order::findOrFail($id);
        $cliente = Customer::findOrFail($pedido->customer_id);

        //Traer el impuesto de la tabla Multitable
        $multitable = Multitable::get();

        $impuesto = $multitable[0]->porcentaje_impuesto;

        //Traer los detalles del pedido --- Codigo , Producto , Precio , Cantidad
        $tabla = DB::select(
            "SELECT p.id, p.nombre, o.precio_venta, o.cantidad   FROM order_details o
                INNER JOIN entry_details e
                ON o.entry_detail_id = e.id
                INNER JOIN products p
                ON e.product_id = p.id
                WHERE o.order_id = $id"
        );

        $pedido = DB::select(
            "SELECT o.id, c.nombre, o.tipo_pedido, o.fecha, 
                ROUND(( SELECT SUM(d.precio_venta * d.cantidad)),2) as 'subtotal', 
                ROUND(( SELECT SUM(d.precio_venta * d.cantidad)) * $impuesto , 2) as 'igv',
                ROUND(( SELECT SUM(d.precio_venta * d.cantidad)) * $impuesto + ( SELECT SUM(d.precio_venta * d.cantidad)),2) as 'total'
                    FROM orders o
                INNER JOIN order_details d
                ON o.id = d.order_id
                INNER JOIN customers c
                ON o.customer_id = c.id
                WHERE o.id = $id
                GROUP BY o.id"
        );


        return view('venta.salida.create',compact('cliente','pedido','multitable','tabla','id'));
    }

    public function save(Request $request)
    {
        $data = request()->validate([
            'tipo_comprobante' => 'required'
        ],
        [
            'tipo_comprobante.required' => 'Ingrese el Tipo de Comprobante',
        ]);

        //La fecha actual
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        //Traer al usuario
        $user = Auth::user();

        //Registrar Venta
        $venta = new Sale();
        $venta->tipo_venta = $request->tipo_venta;
        if($request->tipo_comprobante == 1)
        {
            $venta->tipo_comprobante = "Boleta";
        }
        else
        {
            $venta->tipo_comprobante = "Factura";
        }
        $venta->serie_comprobante = $request->serie;
        $venta->num_comprobante = $request->numero;
        $venta->fecha = $date;
        $venta->impuesto = $request->igv;
        $venta->total = $request->total;
        $venta->estado = "Aceptado";
        $venta->order_id = $request->order_id;
        $venta->user_id = $user->id;
        $venta->save();

        //Cambiar el número final del comprobante

        $numero = "";

        if($request->numero%10 < 9)
        {
            $valor = $request->numero + 0; // para quitar los ceros de delante
            $tam = strlen($valor);
            for($i = 0; $i<6 - $tam  ; $i++)
            {
                $numero = $numero."0";
            }
            $valor++;
            $numero = $numero.$valor;
        }
        else
        {
            $valor = $request->numero + 0; // para quitar los ceros de delante
            $tam = strlen($valor);
            $tam++;
            for($i = 0; $i<6 - $tam ; $i++)
            {
                $numero = $numero."0";
            }
            $valor++;
            $numero = $numero.$valor;
        }

        $tabla = DB::update(
            "UPDATE company_document_details
                SET ultimo_numero=$numero WHERE document_type_id=$request->tipo_comprobante"
        );

        //Cambiar el tipo de pedido
        $tabla = DB::update(
            "UPDATE orders
                SET tipo_pedido='Proforma' WHERE id=$request->order_id"
        );

        return redirect()->route('venta.list')->with('datos', 'Venta Registrado Satisfactoriamente');
    }

    //Recibe el id de la venta
    public function pdf($id)
    {
        //Debe enviar fecha, cliente, direccion del cliente, nro comprobante, detalles
        $info = DB::select(
            "SELECT cu.nombre, cu.direccion, s.fecha, s.num_comprobante FROM sales s
            INNER JOIN orders o
            ON s.order_id = o.id
            INNER JOIN customers cu
            ON o.customer_id = cu.id
            WHERE s.id = $id"
        );

        $detalle = DB::select(
            "SELECT od.precio_venta, od.cantidad, p.nombre, (od.precio_venta * od.cantidad) as 'importe'  FROM sales s
            INNER JOIN orders o
            ON s.order_id = o.id
            INNER JOIN order_details od
            ON o.id = od.order_id
            INNER JOIN entry_details ed
            ON od.entry_detail_id = ed.id
            INNER JOIN products p
            ON ed.product_id = p.id
            WHERE s.id = $id"
        );

        $total = DB::select(
            "SELECT SUM(od.precio_venta * od.cantidad) as 'total'  FROM sales s
            INNER JOIN orders o
            ON s.order_id = o.id
            INNER JOIN order_details od
            ON o.id = od.order_id
            WHERE s.id = $id"
        );

        $venta = Sale::get();

        // $pdf = PDF::loadView('venta.salida.list', compact('venta'));
        // return $pdf->download('invoice.pdf');

        // $pdf = PDF::loadView('pdf.comprobante',compact('info'));
        // return $pdf->stream();

        return view('pdf.comprobante',compact('info','detalle','total'));
    }

    public function encontrarProducto($id)
    {
        $producto = Entry_detail::where('product_id','=',$id)->orderBy('id', 'desc')->first();   
        return $producto;
    }

    public function encontrarInfo($id)
    {
        $documento = Company_Document_Detail::where('document_type_id','=',$id)->get();
        return $documento;
    }
}
