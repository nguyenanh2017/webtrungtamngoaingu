<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route trang chinh cua web
Route::get('/',[
		'as'   => 'home',
		'uses' => 'HomeController@index'
	]);
//trang admin
Route::get('/home',[
	'middleware' => 'auth',
	'as' => 'administrater',
	'uses' => 'HomeController@admin'
	]);
	

//gioi thieu 
Route::get('/introduce',[
		'as' => 'home.introduce',
		'uses' => 'HomeController@introduce'
	]);


//nhom route lay cac mau tin cua tung nhom bai
Route::get('/readmore-tbh',[
		'as' => 'readmore.tbh',
		'uses' => 'HomeController@rm_tbh'
	]);
Route::get('/readmore-tbt',[
		'as' => 'readmore.tbt',
		'uses' => 'HomeController@rm_tbt'
	]);
Route::get('/readmore-tbk',[
		'as' => 'readmore.tbk',
		'uses' => 'HomeController@rm_tbk'
	]);
Route::get('/readmore-ht',[
		'as' => 'readmore.ht',
		'uses' => 'HomeController@rm_ht'
	]);
Route::get('/readmore-tc',[
		'as' => 'readmore.tc',
		'uses' => 'HomeController@rm_tc'
	]);

//ajax load tin moi nhat
Route::get('/newnews',[
		'as' => 'load.newnews',
		'uses' => 'HomeController@load_news'
	]);

//xem bai viet
Route::get('/view/{id}',[
		'as'   => 'view.articles',
		'uses' => 'HomeController@view_articles'
	]);

//bat dang nhap moi duoc vao day

// Route::group(['middleware' => 'auth'], function(){
	
//quan ly user merber de dowload file
Route::group(['middleware' => 'auth'],function(){
	Route::get('/download',[
			'as' => 'user.download',
			'uses' => 'Homecontroller@down_doc'
		]);
});







/*nhom route user*/
Route::group(['middleware' => 'auth'], function(){
			// thêm user
	Route::get('/adduser',[
			'as'   => 'user.get.add',
			'uses' => 'UserController@add'
		]);
	Route::post('/adduser',[
			'as'   => 'user.post.add',
			'uses' => 'UserController@store'
		]);
	//edit +update user do admin thay doi: mat khau, email, ten, quyen +delete

	Route::get('/user/admin/edit/{id}',[
			'as'   => 'admin.edit.user',
			'uses' => 'UserController@ad_edit'
		]);
	Route::post('/user/admin/update/{id}',[
			'as'   => 'admin.update.user',
			'uses' => 'UserController@ad_update'
		]);
	Route::delete('/user/admin/delete/{id}',[
			'as'   => 'admin.destroy.user',
			'uses' => 'UserController@ad_destroy'
		]);


	// edit name user do chinh user do thay doi(chac k can thiet)
	Route::get('/logout',[
		'as'   => 'user.logout',
		'uses' =>	'Auth\LoginController@logout'
	]);
	Route::get('/user/list',[
			'as'   => 'user.show',
			'uses' => 'UserController@show'
		]);

	// thay doi mat khau cua chinh user dang nhap vao(xem set)

});//nhom user

Route::get('/register', [
		'as'   => 'user.get.register',
		'uses' => 'Auth\RegisterController@showRegistrationForm'
	]);

Route::post('/register',[
		'as'   => 'user.post.register',
		'uses' =>	'Auth\RegisterController@register'
	]);

Route::get('/login', [
		'as'   => 'user.get.login',
		'uses' => 'Auth\LoginController@showLoginForm'
	]);
Route::post('/login', [
		'as'   => 'user.post.login',
		'uses' =>	'Auth\LoginController@login'
	]);





/*nhom route bai dang*/
Route::group([	'prefix' => 'articles',
				'middleware' => 'auth'
	], function(){
			// cac route hien thi bai viet

	Route::get('select-all',[
			'as'   => 'articles.select.all',
			'uses' => 'ArticlesController@ar_select_all'
		]);
	Route::get('select-pub',[
			'as'   => 'articles.select.pub',
			'uses' => 'ArticlesController@ar_select_pub'
		]);
	Route::get('select-pri',[
			'as'   => 'articles.select.pri',
			'uses' => 'ArticlesController@ar_select_pri'
		]);
	Route::get('select-use/{id}',[
			'as'   => 'articles.select.use',
			'uses' => 'ArticlesController@ar_select_use'
		]);

		//cac route hieu chinh bai viet
	Route::get('create',[
			'as'   => 'articles.get.create',
			'uses' => 'ArticlesController@create'
		]);
	Route::post('create',[
			'as'   => 'articles.post.create',
			'uses' => 'ArticlesController@store'
		]);

	Route::get('edit/{id}',[
			'as'   => 'articles.edit',
			'uses' => 'ArticlesController@edit'
		]);

	Route::get('{id}',[
			'as'   => 'articles',
			'uses' => 'ArticlesController@articles'
		]);

	Route::post('{id}',[
			'as'   => 'articles.update',
			'uses' => 'ArticlesController@update'
		]);

	Route::delete('{id}',[
			'as'   => 'articles.destroy',
			'uses' => 'ArticlesController@destroy'
		]);
});//nhom bai dang


//nhom route folder + file
//route folder-file
Route::group(['middleware' => 'auth'], function(){

		//route show folder
	Route::get('/folder-show',[
			'as'   => 'folder.show',
			'uses' => 'FolderController@show'
		]);

	Route::get('/folder-create',[
			'as'   => 'folder.get.create',
			'uses' => 'FolderController@create'
		]);
	Route::post('/folder-store',[
			'as'   => 'folder.post.create',
			'uses' => 'FolderController@store'
		]);
	Route::get('/folder-info',[
			'as'   => 'folder.info',
			'uses' => 'FolderController@folder_info'
		]);
	Route::get('/folder-option',[
			'as'	=> 'folder.option',
			'uses'	 => 'FolderController@option'
		]);
	// Route::get('/folder-delete',[
	// 		'as'	=> 'folder.delete',
	// 		'uses'	 => 'FolderController@delete_fd'
	// 	]);
	// Route::get('/folder-move',[
	// 		'as'	=> 'folder.move',
	// 		'uses'	 => 'FolderController@move_fd'
	// 	]);
	// Route::get('/folder-copy',[
	// 		'as'	=> 'folder.copy',
	// 		'uses'	 => 'FolderController@copy_fd'
	// 	]);


		// nhom route xu ly file
	Route::get('/file-upload',[
			'as'   => 'file.get.upload',
			'uses' => 'FileController@upload'
		]);
	Route::post('/file-upload',[
			'as'   => 'file.post.upload',
			'uses' =>'FileController@store'
		]);
	Route::get('/file-show',[
			'as' => 'file.get.show',
			'uses' => 'FileController@show'
		]);
	//ajax dowload
	Route::get('/dowload-file',[
			'as' => 'download.ajax',
			'uses' => "FileController@down_ajax"
		]);

		// da download duoc
	Route::get('/download/{id}',[
			'as' => 'file.get.download',
			'uses' => 'FileController@getDownload'
		]);

	//ajax show file theo thu muc chon
	Route::post('/show-allfile-folder',[
			'as' => 'file.show.allFileFolder',
			'uses' => 'FileController@showAllFileFolder'
		]);
	Route::post('/destroy-file',[
			'as' => 'file.destroy',
			'uses' => 'FileController@destroyFile'
		]);
});









/*nhom route test*/

Route::get('/test', 'FileController@showAllFileFolder');

