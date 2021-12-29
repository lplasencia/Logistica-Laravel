<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return view('venta.pedido.index');
    }

    public function create()
    {
        return  view('venta.pedido.create');
    }
}
