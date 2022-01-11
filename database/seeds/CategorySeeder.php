<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->descripcion = 'Vidrio';
        $category->save();

        $category = new Category();
        $category->descripcion = 'Aluminio';
        $category->save();
    }
}
