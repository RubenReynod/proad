<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            [
                'nombre' => 'Departamento 1'
            ],
            [
                'nombre' => 'Departamento 2'
            ],
            [
                'nombre' => 'Departamento 3'
            ],
            [
                'nombre' => 'Departamento 4'
            ]
        ]);
    }
}
