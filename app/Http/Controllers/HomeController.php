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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Cantidad de Pedidos
        $pedido = DB::select("SELECT count(*) as 'valor' FROM orders WHERE tipo_pedido = 'Pedido'");
        $venta = DB::select("SELECT count(*) as 'valor' FROM sales");
        $usuario = DB::select("SELECT count(*) as 'valor' FROM users");
        $producto = DB::select("SELECT count(*) as 'valor' FROM products");

        return view('home',compact('pedido','venta','usuario','producto'));
    }
}
