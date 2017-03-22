<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\User;
use App\Newsgroup;


class HomeController extends Controller
{
    public function index(){
    	$articles = News::all();

    	return view('trangchinh.home')->with([
    			'articles' => $articles
    		]);
    }
    public function view_articles($id){
    	$articles = News::find($id);
    	// lay ten tac gia dang cai bai nay
    	$name = User::where('email',$articles->name_post)->value('name');
    	// lay ten nhom cua bai viet nay
    	$name_newsgroup = Newsgroup::where('code_newsgroup',$articles->code_news)->value('name_group');
    	
    	return view('trangchinh.view_articles')->with([
    			'articles' 	 => $articles,
    			'ten_tg'	 => $name,
    			'ten_nhombai'=> $name_newsgroup
    		]);
    }
}

