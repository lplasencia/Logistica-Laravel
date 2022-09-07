<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make(12345678);
        $user->employee_id = 11;
        $user->company_id = 1;
        $user->fecha_registro = $date;
        $user->tipo_usuario = 'Administrador';
        $user->save();
    }
}
