<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code = ['TA','TN','TH'];
        $name = ['Tiếng Anh','Tiếng Nhật','Tiếng Hàn'];

       for($i=0;$i<=2;$i++){
       	 Language::create([
       	 		'code_l' => $code[$i],
       	 		'name_l' => $name[$i]
        	]);
       }
    }
}
