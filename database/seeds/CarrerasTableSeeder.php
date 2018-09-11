<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            [
                'nombre' => 'Lincenciatura en informatica',
                'siglas' => 'INF',
                'estatus' => 'activo'
            ],
            [
                'nombre' => 'Ingenieria en computacion',
                'siglas' => 'COM',
                'estatus' => 'activo'
            ],
            [
                'nombre' => 'Ingenieria industrial',
                'siglas' => 'IND',
                'estatus' => 'activo'
            ],
            [
                'nombre' => 'Leyes',
                'siglas' => 'LYS',
                'estatus' => 'activo'
            ]
        ]);
    }
}
