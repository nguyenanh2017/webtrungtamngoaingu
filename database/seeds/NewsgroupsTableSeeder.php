<?php

use Illuminate\Database\Seeder;
use App\Newsgroup;

class NewsgroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	//$faker = Faker\Factory::create();

     	$limit = 5;

     	$code = ['TBH','TBT','TBK','HT','TC'];
     	$name = ['Thông báo học','Thông báo thi','Thông báo khác','Học tập','Thi cử'];


     	for($i = 0 ; $i < $limit; $i++){
     		Newsgroup::create([
     				'code_newsgroup' => $code[$i],
     				'name_group' => $name[$i],
     				'conment' => 'day la comment them'
     			]);
     	}   
    }
}
