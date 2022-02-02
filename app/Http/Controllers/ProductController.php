<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Unit;
use App\Entry_detail;
use DB;

class ProductController extends Controller
{
    public function __contruct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {

        $product = DB::select(" SELECT p.id, p.nombre, p.descripcion, u.descripcion AS 'unidad', c.descripcion AS 'categoria', 
        (SELECT ed.stock_actual FROM entry_details ed WHERE ed.product_id = p.id
           ORDER by ed.id DESC
           LIMIT 1) AS 'stock'
        FROM products p 
        INNER JOIN units u
        ON p.unit_id = u.id
        INNER JOIN categories c
        ON p.category_id = c.id");

        return view('product.index',compact('product'));
    }

    public function create()
    {
        $unidad = Unit::get();
        $categoria = Category::get();
        return view('product.create',compact('unidad','categoria'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|max:60',
            'descripcion' => 'required|max:120',
            /* 'precio_compra'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'precio_venta'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/', */
            'unidad' => 'required',
            'categoria' => 'required',
        ],
        [
            'nombre.required' => 'Ingrese el nombre',
            'nombre.max' => 'Ingrese solo 60 caracteres',
            'descripcion.required' => 'Ingrese el nombre',
            'descripcion.max' => 'Ingrese menos de 120 caracteres',
            /* 'precio_compra.required' => 'Ingrese el precio de compra',
            'precio_compra.regex' => 'Ingrese un entero o decimal',
            'precio_venta.required' => 'Ingrese el precio de venta',
            'precio_venta.regex' => 'Ingrese un entero o decimal', */
            'unidad.required' => 'Ingrese el email',
            'categoria.required' => 'Ingrese el email'
        ]);

        $product = new Product();
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->unit_id = $request->unidad;
        $product->category_id = $request->categoria;
        $product->save();

        return redirect()->route('product.index')->with('datos', 'Producto Registrado Satisfactoriamente');
    }

    public function list()
    {
        $product = Product::get();
        return view('product.list',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $unidad = Unit::get();
        $categoria = Category::get();
        return view('product.edit',compact('product','unidad','categoria'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'nombre' => 'required|max:60',
            'descripcion' => 'required|max:120',
            'unidad' => 'required',
            'categoria' => 'required',
        ],
        [
            'nombre.required' => 'Ingrese el nombre',
            'nombre.max' => 'Ingrese solo 60 caracteres',
            'descripcion.required' => 'Ingrese el nombre',
            'descripcion.max' => 'Ingrese menos de 120 caracteres',
            'unidad.required' => 'Ingrese el email',
            'categoria.required' => 'Ingrese el email'
        ]);

        $product = Product::findOrFail($id);
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->unit_id = $request->unidad;
        $product->category_id = $request->categoria;
        $product->save();

        return redirect()->route('product.index')->with('datos', 'Producto Actualizado Satisfactoriamente');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
