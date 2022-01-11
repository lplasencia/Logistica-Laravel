<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->nombre = 'Templado';
        $product->descripcion = 'Vidrio tipo templado';
        $product->unit_id = 1;
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->nombre = 'Antirreflejo';
        $product->descripcion = 'Vidrio tipo antirreflejo';
        $product->unit_id = 1;
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->nombre = 'Laminado';
        $product->descripcion = 'Vidrio tipo laminado';
        $product->unit_id = 1;
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->nombre = 'Arenado';
        $product->descripcion = 'Vidrio tipo arenado';
        $product->unit_id = 1;
        $product->category_id = 1;
        $product->save();
    }
}
