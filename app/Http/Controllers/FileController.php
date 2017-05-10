<?php

namespace App\Http\Controllers;
use Request;
//do su dug ajax trong file nay nen k the sai use Illuminate\Http\Request
//va thay the bang use App\Http\Requests\FormUpFileRequest
use App\Http\Requests\FormUpFileRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use Auth;
use App\Folder;
use App\Document;


class FileController extends Controller
{

    public function showa(){
        //show folder
        $fd_root = Folder::where('id_parent','=',Null)->get();
        //lay data folder
        $data_f = Folder::all();

        return view('file.show')->with([
                'fd_root' => $fd_root,
                'data_f' => $data_f
            ]);
    }
    //show cac file trong thu muc da chon
    public function showAllFileFolder(){
        if(Request::ajax()){
            //nhan id tu client
            $id = (int)Request::get('id');
            //slect cac file da luu trong csdl voi id_fd la $id
            $file = Document::where("in_fd",$id)->get();

            $data = Folder::all();

            $kq = "";
            foreach($file as $f){
                //lay ra url cua hinh anh tu ten
                $url = Storage::url($f->url_d);
                $kq .='<img id="img_show" src="'.$url.'">'.'<a onclick="file_select(this)" class="'.$f->id.'">'.$f->name_d.'</a><br/>';
            }
            if($kq == ""){
               if(checkChild($data,$id) != 0 ){
                    return "Thư mục không có file - nhưng có thư mục con";
               }else 
                return "Thư mục đang rỗng";
            }else return $kq;
        }

    }


    public function upload(){
        $folder = Folder::all();
    	return view('file.upload')->with([
                'folder' => $folder
            ]);
    }

    public function store(FormUpFileRequest $request){
        // lay thong tin: thu muc
        $info = $request->all();
    	//lay cac file dc tai len cho vao mang files
    	$files = Input::file('tenfile');

        // lay tat cac cac thu muc hien co + truyen vao do la id cua thu muc can luu file
        // goi ham folder_url => dung dan tuyet doi bat dau tu root(public) den thu muc de luu file
        $allFolder = Folder::all();
        $folder = $info['in_fd'];
        $url = folder_url($allFolder,$folder);
        $resul = 'Tải tài liệu lên thư mục: <b>'.$url."</b> :<br>";
       // return $url;

    	//dem bao nhieu file
    	$count_f = count($files);
    	$i = 1;
    	//kiem tra file co up len khong
    	if(isset($files)){
	    	foreach($files as $f){
                //truong hop khong duoc upload file  => file da ton tai trong thu muc             
                    $pathfile = $url.'/'.$f->getClientOriginalName();
                if(Storage::exists((string)$pathfile)){
                    $resul = $resul.$i.".File: <b>".$f->getClientOriginalName()." đã tồn tại</b>.<br>";
                }else {
                    //luu file vao he thong
                    Storage::putFileAs((string)$url,$f,$f->getClientOriginalName());//luu file tra ve la 1 duong dan de file
                    // luu thanh cong file thi luu thong tin file vao CSDL
                    $user = Auth::user()->id; //lay ra email cua ng tai len
                    $doc = new Document;
                    $doc->name_d = $f->getClientOriginalName();
                    $doc->comment = $info['comment'];
                    $doc->url_d = $pathfile;
                    $doc->user_create_d = $user;
                    $doc->in_fd = $info['in_fd'];
                    $doc->save();

                    $resul = $resul.$i.".File: ".$f->getClientOriginalName()." tải lên thành công.<br>";
                }
                $i++;
	    	}//for
    	}else    	
    	return "Không có file nào tải lên.";

        return redirect()->route('file.get.upload')->with([
                //mot thong bao chung innfo o: blocks/small_message
            'info' => 'info',
            'content_info' => $resul
            ]);
    }//store
    // ajax dowload
    public function down_ajax(){
        if(Request::ajax()){
            $id = (int)Request::get('id');
             $url = route('file.get.download',$id);
             return $url;
        }
       
    }

    //controller dowload
    public function getDownload($id){
        //pathfile = url web + '/app/' + url file
        $file = Document::find($id);
        $pathfile = storage_path()."/app/".$file->url_d;
        //echo $pathfile;
        return response()->download($pathfile);
    }

    public function destroyFile(){
        if(Request::ajax()){
            //nhan id xoa tu client
            $id = (int)Request::get('id');
            //tim cai dong id de xoa trong CSDL de danh xoa
            $file_document = Document::where('id','=',$id)->get();
            //lay url file
            foreach($file_document as $key=>$val){
                $url = $val['url_d'];
            }
            // kiem tra file co ton tai hay khong
            if(Storage::exists($url)){
                //xoa file o tren dia
                Storage::delete($url);
                //xoa file luu trong CSDL
                Document::destroy($id);
                return "oke";
            }return "khong co file";
        }//if
    }//funciton destroy

}
