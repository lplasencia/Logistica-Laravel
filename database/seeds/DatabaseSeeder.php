<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(CompanySeeder::class);
        // $this->call(EmployeeSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(UnitSeeder::class);
        // $this->call(MultitableSeeder::class);
        // $this->call(CustomerSeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(SupplierSeeder::class);
    }
}
