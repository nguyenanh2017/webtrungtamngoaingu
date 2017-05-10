<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormUserRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Permittion;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
	public function show(){
		$user = User::orderBy('level')->paginate(5) ;
        $permit = Permittion::all();
		return view('users.show')->with([
            'user' => $user,
            'permit' => $permit
            ]);
	}
	
	
    public function add(){
        $permit = Permittion::all();
        return view('users.add')->with('permit',$permit);
    }

    public function store(FormUserRequest $request){
        $input = $request->all();
        
        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->level = $input['level'];
        $user->save();

        return redirect()->route('user.show')->with([
                'status_msg' => 'result_msg',
                'content_msg' => 'Thêm thành công Người dùng: '.$input['name']
            ]);
    }


    //edit + update + delete cua admin de quan ly user

    public function ad_edit($id){
        // lay ra quyet user edit
        $lv_edit = User::where('id','=',$id)->value('level');
        $name_edit = User::where('id','=',$id)->value('name');

        // khong duoc edit chinh minh va nguoi cao hon minh{
        //     member khong
        //     super < admin <member : thag nao co level nho duoc edit thag co level lon hon
        if(Auth::user()->level == $lv_edit || Auth::user()->level > $lv_edit || Auth::user()->level == 3){
            return redirect()->route('user.show')->with([
                    'status_msg' => 'error_msg',
                    'content_msg' => 'Bạn không được phép sửa Người dùng: '.$name_edit
                ]);
        }else {
            $user = User::find($id);
            //load permit name len
            $permit = Permittion::all();
            // lay ten quyen hien tai cua user
            $permit_selected = new Permittion;
            $name_permit = $permit_selected->find_name_permit($user->level);


        return view('users.ad_edit')->with([
                'user' => $user,
                'permit' => $permit,
                'name_permit' => $name_permit
            ]);
        }

    		
    }

    public function ad_update(Request $request, $id){

    	 $input = $request->all();

    	// validate cho $request: neu co password thi min:6 neu khong co thi k check password
         // if($input['password'] == null){
         //    dd("k co pas ne");
         // }

    	if($input['password'] != null){
		   	$this->validate($request,[
		   	 		'name' => 'required',
		   	 		'email' => 'email|required',
		   	 		'password' => 'min:6|confirmed',
		   	 	]);
	   	}else $this->validate($request,[
	   			'name' => 'required',
	   			'email' => 'email|required',
	   		]);
	   	

	   	 $user = User::find($id);
	   	 $user->name = $input['name'];
	   	 $user->email = $input['email'];
		//check neu khong co mat khau moi thi khong thay doi
	   	 if($input['password'] != null){
	   	 $user->password = bcrypt($input['password']);
	   	 }

	   	 $user->level = $input['level'];
	   	 $user->save();

	   	 return redirect()->route('user.show')->with([
                'status_msg' => 'result_msg',
                'content_msg'   => 'Đã sửa Người dùng: '.$user->name.' thành công'
            ]);
    }

    public function ad_destroy($id){
        $user_del = User::find($id);
        $name_del = $user_del->name;
        $permit_user_del = $user_del->level;
        $permit_user = Auth::user()->level;

        if($permit_user >= $permit_user_del){
            return redirect()->route('user.show')->with([
                    'status_msg' => 'error_msg',
                    'content_msg' => 'Bạn không được phép xóa Người dùng: '.$name_del
                ]);
        }else
            {
                // $user_del->delete();
                return redirect()->route('user.show')->with([
                    'status_msg' => 'result_msg',
                    'content_msg' => 'Xóa Người dùng: '.$name_del.' thành công!'
                ]);}
    }


}
