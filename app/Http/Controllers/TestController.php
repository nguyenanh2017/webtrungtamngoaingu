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
  	    
    	return view('test');
    }
}
