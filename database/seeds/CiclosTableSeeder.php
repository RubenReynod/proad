<?php

use Illuminate\Database\Seeder;

class CiclosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciclos')->insert([
        	[
        		'nombre' => '2017A',
        	],
            [
        		'nombre' => '2017B',
        	],
        	[
        		'nombre' => '2018A',
        	],
        	[
        		'nombre' => '2018B',
        	],
        	[
        		'nombre' => '2019A',
        	],
        ]);
    }
}
