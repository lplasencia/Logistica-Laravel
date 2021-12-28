<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    public function index()
    {
        return view('venta.comprobante.index');
    }

    public function create()
    {
        return view('venta.comprobante.create');
    }

    public function cindex()
    {
        return view('venta.comprobante.configuracion.index');
    }
}
