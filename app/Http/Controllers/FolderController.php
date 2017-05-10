<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests\FormFolderRequest;
//use Illuminate\Http\Request;
use App\User;
use App\Language;
use App\Folder;
use Auth;
use Storage;
use Illuminate\Support\Facades\DB;

class FolderController extends Controller
{
    public function show(){
    	$fd_root = Folder::where('id_parent','=',Null)->get();
        //lay data folder
        $data_f = Folder::all();
        
        return view('folders.show')->with([
                'fd_root' => $fd_root,
                'data_f' => $data_f
            ]);
    }
    public function folder_info(){
        if(Request::ajax()){
            $id = (int)Request::get('id');
            $folder = Folder::where('id_fd','=',$id)->get();
            foreach($folder as $key => $val){
                //lay ra nguoi tao
                $user_create = User::where('id','=',$val->user_create_fd)->value('email');
                //lay ra thong tin folder thuoc ngon ngu gi
                $lg = Language::where('code_l','=',$val->fd_l)->value('name_l');
                $kq = "Thư mục: <a>".($val->name_fd)."</a><br/>".
                        "Người tạo: ".$user_create."<br/>".
                        "Ngày tạo: ".($val->created_at->format('d/m/y'))."<br/>".
                        "Thuộc ngôn ngữ: ".$lg;
                    return $kq;
            }
        }
    }
    public function option(){
        if(Request::ajax()){
            $id = (int)Request::get('id');
            $yeucau = Request::get('yeucau');
            if($yeucau == 'rn'){
                //phan quyen don gian: 
                //chi co chu so huu thu muc nay moi duoc doi ten thoi
                $user_create = Folder::where('id_fd','=',$id)->value('user_create_fd');
                
                if(Auth::user()->id != $user_create){
                    return "no ok";
                }else{
                     $new_name = Request::get('new_name');
                    // mang folder + id => url
                    $allfolder = Folder::all();
                    // $urlFolder_select la url cua thu muc do
                    $urlFolder_select = folder_url($allfolder,$id);
                    //kiem tra xem folder nay co tao trong o dia chua(neu chua co la folder trong or moi tao chua co du lieu)
                    if(Storage::exists((string)$urlFolder_select)){
                        // doi ten thu muc trong o dia
                        // doi ten tuc la move->url giong nhu ten thy khac
                        $old_name = Folder::where('id_fd','=',$id)->value('name_fd');
                        //tim url cua thu muc cha no:
                        $urlFolder_parent = str_replace(str_replace(' ','',$old_name),'',$urlFolder_select);
                        //doi ten thu muc
                        Storage::move($urlFolder_select,$urlFolder_parent.str_replace(' ','',$new_name));
                       //neu co thu muc trong o dia thy doi ten thu muc
                    }
                     //doi ten trong CSDL
                    // update -> name_fd
                    $folder = DB::table('folders')->where('id_fd',$id)->update([
                        'name_fd' => $new_name
                        ]);
                        return $new_name;
                }

            }elseif($yeucau == 'dl'){
                return "xoa";
            }elseif($yeucau == "mv"){
                return "di chuyen-chua duoc phat trien";
            }else {

            return "copy -chua duoc phat trien";
            }
        }
    }


    public function create(){
    	$folder = Folder::all();
    	$lang = Language::all();

    	return view('folders.create')->with([
    			'lang' => $lang,
    			'folder' => $folder
    		]);
    }
    public function store(FormFolderRequest $request){

    	$input = $request->all();
        $user = Auth::user()->id;
    	$f = new Folder;

    	$f->name_fd  = $input["name_fd"];
    	$f->id_parent = $input["id_parent"];
    	$f->fd_l      = $input["fd_l"];
        $f->user_create_fd = $user;
    	$f->save();
    	

    	return redirect()->route('folder.get.create')->with([
                'status_msg' => 'result_msg',
                'content_msg' => 'Đã tạo thành công thư mục: '.$input["name_fd"]
            ]);

    }
}
