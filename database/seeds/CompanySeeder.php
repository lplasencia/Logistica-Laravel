<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = new Company();
        $companies->razon_social = 'Vidrieria Alva';
        $companies->ruc = '1018872629';
        $companies->direccion = 'Av. España';
        $companies->telefono = '989980850';
        $companies->representante = 'Abel Alva Cruz';
        $companies->email = 'alva@empresa.com';
        $companies->save();
    }
}
