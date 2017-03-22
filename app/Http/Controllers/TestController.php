<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permittion;
use App\Newsgroup;
use App\News;
use App\User;
use DB;


class TestController extends Controller
{

    public function index(){
  	    $n = new Newsgroup();
  	    $user = User::select('email')->get()->toArray();
  	    $code = Newsgroup::select('code_newsgroup')->get()->toArray();

  	    $a = array('a','b','c');
  	    $i = 0;
  	    foreach($user as $key=>$value ){
  	    	foreach($value as $k=>$v){
  	    		$a[$i] = $v;
  	    		$i++;
  	    	}
  	    }
  	    $b = array('a','b','c');
  	    
  	    	$i=0;
  	    foreach($code as $key=>$value ){
  	    	foreach($value as $k=>$v){
  	    		$b[$i] = $v;
  	    		$i++;
  	    	}
  	    }

    	dd($b);
    	return view('test');
    }
}
