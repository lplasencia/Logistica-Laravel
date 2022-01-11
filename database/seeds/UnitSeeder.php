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
        $unit->descripcion = 'Vidrio';
        $unit->save();

        $unit = new Unit();
        $unit->descripcion = 'Vidrio';
        $unit->save();
    }
}
