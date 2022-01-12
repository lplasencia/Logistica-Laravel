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

class VentaController extends Controller
{
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

        //Variables que se van a enviar por la ruta
        $igv = $request->igv;
        $subtotal = $request->subtotal;
        $total = $request->total;
        $id = $pedido->id;

        return redirect()->route('venta.create',compact('igv','total','id','subtotal'))->with('datos', 'Entrada Registrado Satisfactoriamente');
    }

    //Recibe el igv, total y id del pedido
    public function create($igv,$total,$id,$subtotal)
    {
        //Traer al cliente
        $pedido = Order::findOrFail($id);
        $cliente = Customer::findOrFail($pedido->customer_id);

        //Traer el impuesto de la tabla Multitable
        $multitable = Multitable::get();

        //Traer los detalles del pedido --- Codigo , Producto , Precio , Cantidad
        $tabla = DB::select(
            "SELECT p.id, p.nombre, o.precio_venta, o.cantidad  FROM order_details o
                INNER JOIN entry_details e
                ON o.entry_detail_id = e.id
                INNER JOIN products p
                ON e.product_id = p.id
                WHERE o.order_id = $id"
        );


        return view('venta.salida.create',compact('igv','total','cliente','subtotal','multitable','tabla','id'));
    }

    public function save(Request $request)
    {
        //Falta Validar :'v 


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


        return redirect()->route('home')->with('datos', 'Venta Registrado Satisfactoriamente');
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
