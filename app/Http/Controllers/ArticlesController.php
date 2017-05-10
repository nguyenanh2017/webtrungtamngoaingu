<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests\FormArticlesRequest;
//use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Newsgroup;
use App\News;
use App\User;

class ArticlesController extends Controller
{
	//function hien thi tat ca cac bai viet
    public function ar_select_all(){
        $articles = News::orderBy('created_at','desc')->paginate(5);
        return view('articles.show')->with([
        'articles' => $articles,
        'ar_type' => "all"
        ]);
    }
    public function ar_select_pub(){
        $articles = News::where('public','=',0)->orderBy('created_at','desc')->paginate(5);
        return view('articles.show')->with([
        'articles' => $articles,
        'ar_type' => "pub"
        ]);
    }
    public function ar_select_pri(){
        $articles = News::where('public','=',1)->orderBy('created_at','desc')->paginate(5);
        return view('articles.show')->with([
        'articles' => $articles,
        'ar_type' => "pri"
        ]);
    }
    public function ar_select_use($id){
        $user = User::where('id','=',$id)->value('email');

        $articles = News::where('name_post','=',$user)->orderBy('created_at','desc')->paginate(5);
        return view('articles.show')->with([
         'articles' => $articles,
         'ar_type' => "use"
        ]);
    }

     //function doc bai viet day du
    public function articles($id){

        $articles = News::find($id);

        $user_ar = User::where('email','=',$articles->name_post)->value('id');

    	return view('articles.articles')->with([
            'articles' => $articles,
            'user_ar'  => $user_ar

            ]);
    }



    public function create(){
    	$news_group = Newsgroup::all();

    	return view('articles.create')->with('newsgroup',$news_group);
    }

    public function store(FormArticlesRequest $request){
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

    	return redirect()->route('articles.select.all') ;
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

    public function update(FormArticlesRequest $request, $id){
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

    	return redirect()->route('articles.select.all');
    }

    public function destroy($id){
    	News::findOrFail($id)->delete();
    	return redirect()->route('articles.select.all');
    }

}
