<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProfesoresTableSeeder::class);
        $this->call(CiclosTableSeeder::class);
        $this->call(CarrerasTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
    }
}
