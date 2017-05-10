<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Auth;
use App\News;
use App\Language;
use App\Learn;
use App\User;
use App\Folder; 
use App\Newsgroup;



class HomeController extends Controller
{
    public function index(){
    	$hoctap = News::where('code_news','=','HT')->where('public','=',0)->orderBy('created_at','desc')->take(7)->get();
        $thicu = News::where('code_news','=','TC')->where('public','=',0)->orderBy('created_at','desc')->take(7)->get();
        $thongbaohoc = News::where('code_news','=','TBH')->where('public','=',0)->orderBy('created_at','desc')->take(5)->get();
        $thongbaothi = News::where('code_news','=','TBT')->where('public','=',0)->orderBy('created_at','desc')->take(5)->get();
        $thongbaokhac = News::where('code_news','=','TBK')->where('public','=',0)->orderBy('created_at','desc')->take(5)->get();

    	return view('trangchinh.home')->with([
            'hoctap' => $hoctap,
            'thicu'  => $thicu,
            'thongbaohoc' => $thongbaohoc,
            'thongbaothi' => $thongbaothi,
            'thongbaokhac' => $thongbaokhac
    		]);
       
    }

    //trang admin
    public function admin(){
        $thongbaonoibo = News::where('public','=',1)->orderBy('created_at','desc')->paginate(7);
        return view('admin.home')->with([
                'articles' => $thongbaonoibo
            ]);
    }



    public function introduce(){
        return view("trangchinh.introduce");
    }



    public function load_news(){
        $news = News::where('public','=',0)->orderBy('created_at','desc')->take(12)->get();
        $kq = "";
        foreach($news as $key => $n){
            $kq .= '<li>
            <span class="glyphicon glyphicon-tags"></span>
            <a href="'.route('view.articles',$n->id).'">'.$n->title_news.'</a>
            <br>                
            <p><span class="glyphicon glyphicon-calendar">'.$n->created_at->format('d/m/Y').'</span></p>
        </li>';
        }
        return $kq;
    }

    public function rm_tbh(){
       $thongbaohoc = News::where('code_news','=','TBH')->where('public','=',0)->orderBy('created_at','desc')->paginate(7);
        
        return view('trangchinh.readMore')->with([
                    'type_group' => 'thông báo học',
                    'articles' => $thongbaohoc
            ]);;
    }

    public function rm_tbt(){
        $thongbaothi = News::where('code_news','=','TBT')->where('public','=',0)->orderBy('created_at','desc')->paginate(7);
        
        return view('trangchinh.readMore')->with([
                    'type_group' => 'thông báo thi',
                    'articles' => $thongbaothi
            ]);;
    }

    public function rm_tbk(){
       $thongbaokhac = News::where('code_news','=','TBK')->where('public','=',0)->orderBy('created_at','desc')->paginate(7);
        
        return view('trangchinh.readMore')->with([
                    'type_group' => 'thông báo khác',
                    'articles' => $thongbaokhac
            ]);;
    }

    public function rm_ht(){
        $hoctap = News::where('code_news','=','HT')->where('public','=',0)->orderBy('created_at','desc')->paginate(7);
        
        return view('trangchinh.readMore')->with([
                    'type_group' => 'học tập',
                    'articles' => $hoctap
            ]);;
    }

    public function rm_tc(){
        $thicu = News::where('code_news','=','TC')->where('public','=',0)->orderBy('created_at','desc')->paginate(7);
        
        return view('trangchinh.readMore')->with([
                    'type_group' => 'thi cử',
                    'articles' => $thicu
            ]);;
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

    public function down_doc(){
        /*ban la ai*/ $user = Auth::user()->email;
        /*ban dang hoc gi*/ $learn = Learn::where('student','=',$user)->get();
        // dua vao hoc ngon ngu do ban duoc phep download o thu muc nao
        $folder = array();
        foreach($learn as $key => $l){
          array_push($folder,(Folder::where('fd_l','=',$l->learn_l)->get()));
        }

        return view('trangchinh.download')->with([
                'folder' => $folder
            ]);
    }

}

