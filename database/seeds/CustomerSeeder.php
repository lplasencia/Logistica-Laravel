<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->company_id = 1;
        $customer->nombre = 'Astrid Rocha Amaya';
        $customer->direccion = 'Av. almagro 55';
        $customer->telefono = '995478563';
        $customer->email = 'astrid_15@gmail.com';
        $customer->save();

        $customer = new Customer();
        $customer->company_id = 1;
        $customer->nombre = 'Jose Antonio Badia Almanza';
        $customer->direccion = 'Av. lima 85';
        $customer->telefono = '998645123';
        $customer->email = 'jose_15_95@gmail.com';
        $customer->save();
    }
}
