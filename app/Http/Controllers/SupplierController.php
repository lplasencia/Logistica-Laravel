<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function __contruct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $supplier = Supplier::get();
        return view('supplier.index',compact('supplier'));
    }

    public function create()
    {
        return view('supplier.create');
    }
}
