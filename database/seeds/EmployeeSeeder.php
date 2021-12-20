<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee();
        $employee->nombre = 'Luis Diego Plasencia Amaya';
        $employee->dni = '70668041';
        $employee->direccion = 'Av. los heroes';
        $employee->telefono = '949503135';
        $employee->email = 'lplasenciaamaya@gmail.com';
        $employee->fecha_nac = '1998-09-16';
        $employee->save();
    }
}
