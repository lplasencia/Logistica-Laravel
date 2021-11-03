<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __contruct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('customer.index');
    }
}
