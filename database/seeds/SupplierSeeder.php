<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new Supplier();
        $supplier->company_id = 1;
        $supplier->nombre = 'Vidrieria Guzman';
        $supplier->representante = 'Javier Luis Lopez Arias';
        $supplier->ruc = '1054256921';
        $supplier->direccion = 'Av. esperanza 160';
        $supplier->telefono = '991524102';
        $supplier->email = 'javier_lopez_20@gmail.com';
        $supplier->save();
    }
}
