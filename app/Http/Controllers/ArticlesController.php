<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Newsgroup;
use App\News;

class ArticlesController extends Controller
{
	//function hien thi tat ca cac bai viet
    public function index(){
    	$articles = News::all();
    	$ar_sum = count($articles);
    	return view('articles.show')->with([
    		'articles' => $articles,
    		'ar_sum' => $ar_sum
    		]);

    }
    //chi hieu bai viet private
    public function arprivate(){
    	$articles = News::all();
    	//tinh tong bai viet
    	$ar_sum = 0;
    	foreach($articles as $article){
    		if($article->public == 1) {++$ar_sum; }
    	}
    	
    	$p = 1;
    	return view('articles.show')->with([
    			'articles' => $articles,
    			'ar_sum' => $ar_sum,
    			'p' => $p
    		]); 
    }
    //chi hien bai viet public
     public function arpublic(){
    	$articles = News::all();
    	//tinh tong bai viet;
    	$ar_sum = 0;
    	foreach($articles as $article){
    		if($article->public == 0) {++$ar_sum; }
    	}
    	
    	$p = 0;
    	return view('articles.show')->with([
    			'articles' => $articles,
    			'ar_sum' => $ar_sum,
    			'p' => $p
    		]); 
    }

     //function doc bai viet day du
    public function articles($id){
    	$articles = News::find($id);
    	return view('articles.articles')->with('articles',$articles);
    }



    public function create(){
    	$news_group = Newsgroup::all();

    	return view('articles.create')->with('newsgroup',$news_group);
    }

    public function store(Request $request){
    	$dlinput = $request->all();
    	//xu ly xem coi co private bai viet khong, mac dinh la 0, neu ton tai public =1 thi la co
    	$a = 0;
    	if(in_array("1",$dlinput)){
    		$a = 1;
    	}

    	$articles = new News;	
		$articles->title_news = $dlinput["title_news"];
		$articles->header = $dlinput["header"];
		$articles->content = $dlinput["content"];
		$articles->public = $a;
		$articles->name_post = $dlinput["name_post"];
		$articles->code_news = $dlinput["code_news"];
			 	    	
		$articles->save();

    	return redirect()->route('articles.show') ;
    }

    public function edit($id){
    	//lay 1 record trong table news
    	$find_record = News::find($id);

    	//lay cac name group
    	$news_group = Newsgroup::all();
    	//lay name group da chon
    	$find_namegroup = new Newsgroup();
    	$name_group_selected = $find_namegroup->find_name_group($find_record->code_news);

    	
    	return view('articles.edit')->with([
    			'newsgroup' => $news_group,
    			'find_record' => $find_record,
    			'name_group_selected' => $name_group_selected
    		]);
    }

    public function update(Request $request, $id){
    	$input = $request->all();
    	//check hay k check public
    	$a = 0;
    	if(in_array("1",$input)){
    		$a = 1;
    	}

    	$articles = News::find($id);
    	$articles->title_news = $input['title_news'];
    	$articles->header = $input['header'];
    	$articles->content = $input['content'];
    	$articles->public = $a;
    	$articles->code_news = $input['code_news'];

    	$articles->save();

    	return redirect()->route('articles.show');
    }

    public function destroy($id){
    	News::findOrFail($id)->delete();
    	return redirect()->route('articles.show');
    }

}
