<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('mantenimiento.documento.index');
    }

    public function create()
    {
        return view('mantenimiento.documento.create');
    }
}
