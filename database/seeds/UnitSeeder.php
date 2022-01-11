<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = new Unit();
        $unit->descripcion = 'Metro cuadrado';
        $unit->save();

        $unit = new Unit();
        $unit->descripcion = 'Metro';
        $unit->save();

        $unit = new Unit();
        $unit->descripcion = 'kilogramo';
        $unit->save();
    }
}
