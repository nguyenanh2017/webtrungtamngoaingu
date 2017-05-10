<?php

use Illuminate\Database\Seeder;
use App\Permittion;

class PermittionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$l = ['1','2','3'];
    	$n = ['SuperAdmin','Admin','Member'];
    	for($i = 0; $i < 3; $i++){
        Permittion::create([
        	'level_permittion' => $l[$i],
        	'name_permit' => $n[$i]
        	]);
        }
    }
}
