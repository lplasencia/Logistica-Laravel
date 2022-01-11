<?php

use Illuminate\Database\Seeder;
use App\Multitable;

class MultitableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new Multitable();
        $table->nombre_impuesto = 'IGV';
        $table->porcentaje_impuesto = 0.18;
        $table->simbolo_moneda = 's/.';
        $table->save();
    }
}
