<?php

use Illuminate\Database\Seeder;
use App\News;
use App\User;
use App\Newsgroup;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// 2 mang la email + code_news nhung o day la mang ket hop
		$user = User::select('email')->get()->toArray();
  	$code = Newsgroup::select('code_newsgroup')->get()->toArray();
  	    //code xu ly mang ket hop => mang gia tri binh thuong
  	    $email_user = array(); /*mang email tu bang user*/
  	    $i = 0;
  	    foreach($user as $key=>$value ){
  	    	foreach($value as $k=>$v){
  	    		$email_user[$i] = $v;
  	    		$i++;
  	    	}
  	    }
  	    $code_news = array(); /*mang code_new tu bang newsgroup*/
  	    $i = 0;
  	    foreach($code as $key=>$value ){
  	    	foreach($value as $k=>$v){
  	    		$code_news[$i] = $v;
  	    		$i++;
  	    	}
  	    }

  	    //xu ly them du lieu tu dong vao bang news
        $faker = Faker\Factory::create();

        $limit = 10;

        for($i=0 ; $i < $limit; $i++){
        	News::create([
        		'title_news' => $faker->text,
        		'header'     => $faker->text,
        		'content'    => $faker->text,
        		'public'     => $faker->numberBetween($min = 0 , $max = 1),
        		'name_post'  => $faker->randomElement($email_user),
        		'code_news'  => $faker->randomElement($code_news)
        		]);
        }
    }
}
