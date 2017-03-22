<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Permittion;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
	public function show(){
		$user = User::all();
        $permit = Permittion::all();
		return view('users.show')->with([
            'user' => $user,
            'permit' => $permit
            ]);
	}
	
	//edit + update cua user tu thay doi thong tin cho minh thanh vien
    public function edit($id){
    	$user = User::find($id);
    	//lay ra cac quyen
    	$permit = Permittion::all();
    	//lay ra ten quyen hien tai
    	$name_lv = new Permittion;
    	$name_lv_selected = $name_lv->find_name_permit($user->level);


    	return view('users.edit')->with([
    		'user'=> $user,
    		'permit' => $permit,
    		'name_lv_selected' => $name_lv_selected
    		]);
    }
    public function update($id, Request $request){
    	$input = $request->all();

    	$user = User::find($id);
    	$user->name = $input['name'];
    	$user->save();
    		return redirect()->route('administrater');
    	
    }
    //them nguoi dung moi tu admin
    public function add(){
        $permit = Permittion::all();
        return view('users.add')->with('permit',$permit);
    }

    public function store(Request $request){
        $input = $request->all();

        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->level = $input['level'];
        $user->save();

        return redirect()->route('administrater');
    }


    //edit + update + delete cua admin de quan ly user

    public function ad_edit($id){
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

    public function ad_update(Request $request, $id){

    	 $input = $request->all();
    	// validate cho $request: neu co password thi min:6 neu khong co thi k check password
    	if(in_array('password',$input)){
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
	   	 if(in_array('password',$input)){
	   	 $user->password = bcrypt($input['password']);
	   	 }

	   	 $user->level = $input['level'];
	   	 $user->save();

	   	 return redirect()->route('user.show');
    }

    public function ad_destroy($id){
        $user_del = User::find($id);
        $permit_user_del = $user_del->level;
        $permit_user = Auth::user()->level;

        if($permit_user >= $permit_user_del){
            return redirect()->route('user.show')->with([
                    'status_msg' => 'error_msg',
                    'content_msg' => 'Bạn không được phép xóa user này!'
                ]);
        }else
            {
                // $user_del->delete();
                return redirect()->route('user.show')->with([
                    'status_msg' => 'result_msg',
                    'content_msg' => 'Xóa user thành công!'
                ]);}
        
    }


}
