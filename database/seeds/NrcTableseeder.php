<?php

use Illuminate\Database\Seeder;

class NrcTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nrc')->insert([
            [
            	'nrc' => 'dts135',
            	'id_profesor' => '1234'
            ],
            [
            	'nrc' => 'jgh675',
            	'id_profesor' => '1234'
            ],
            [
            	'nrc' => 'sdg424',
            	'id_profesor' => '1234'
            ],
            [
            	'nrc' => 'fgh954',
            	'id_profesor' => '1234'
            ],
        ]);
    }
}
