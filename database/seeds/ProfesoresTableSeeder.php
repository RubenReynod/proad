<?php

use Illuminate\Database\Seeder;

class ProfesoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('profesores')->insert([
            'codigo' => "1234",
            'password' => Hash::make("proad"),
            //'contraseña' => bcrypt("proad123"),
            'nombre' => "cesar",
            'apellidoP' => "Carrillo",
            'apellidoM' => "Blanquel",
            'estatus' => "activo",
            'sexo' => "hombre",
        ]);

    }
}
