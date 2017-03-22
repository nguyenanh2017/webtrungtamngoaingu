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
Route::get('/view/{id}',[
		'as'   => 'view.articles',
		'uses' => 'HomeController@view_articles'
	]);


Route::get('/home',function(){
	return view('admin.home');
})->name('administrater');

/*nhom route user*/
Route::get('/register', [
		'as'   => 'user.get.register',
		'uses' => 'Auth\RegisterController@showRegistrationForm'
	]);

Route::post('/register',[
		'as'   => 'user.post.register',
		'uses' =>	'Auth\RegisterController@register'
	]);
		// thêm user
Route::get('/adduser',[
		'as'   => 'user.get.add',
		'uses' => 'UserController@add'
	]);
Route::post('/adduser',[
		'as'   => 'user.post.add',
		'uses' => 'UserController@store'
	]);


Route::get('/login', [
		'as'   => 'user.get.login',
		'uses' => 'Auth\LoginController@showLoginForm'
	]);
Route::post('/login', [
		'as'   => 'user.post.login',
		'uses' =>	'Auth\LoginController@login'
	]);

Route::get('/logout',[
		'as'   => 'user.logout',
		'uses' =>	'Auth\LoginController@logout'
	]);
Route::get('/login/list',[
		'as'   => 'user.show',
		'uses' => 'UserController@show'
	]);
//edit +update user do admin thay doi: mat khau, email, ten, quyen +delete

Route::get('/login/admin/edit/{id}',[
		'as'   => 'admin.edit.user',
		'uses' => 'UserController@ad_edit'
	]);
Route::post('/login/admin/update/{id}',[
		'as'   => 'admin.update.user',
		'uses' => 'UserController@ad_update'
	]);
Route::delete('/login/admin/delete/{id}',[
		'as'   => 'admin.destroy.user',
		'uses' => 'UserController@ad_destroy'
	]);




// edit name user do chinh user do thay doi
Route::get('/login/edit/{id}',[
		'as'    => 'user.edit',
		'uses'  => 'UserController@edit'
	]);
Route::post('/llogin/update/{id}',[
		'as'   => 'user.update',
		'uses' => 'UserController@update'
	]);
// thay doi mat khau cua chinh user dang nhap vao


/*nhom route bai dang*/
Route::get('/articles',[
		'as'   => 'articles.show',
		'uses' => 'ArticlesController@index'
	]);

Route::get('/articles/public',[
		'as'   => 'articles.public',
		'uses' => 'ArticlesController@arpublic'
	]);
Route::get('/articles/private',[
		'as'   => 'articles.private',
		'uses' => 'ArticlesController@arprivate'
	]);
		// cac route hien thi bai viet
Route::get('/articles/create',[
		'as'   => 'articles.get.create',
		'uses' => 'ArticlesController@create'
	]);
Route::post('/articles/create',[
		'as'   => 'articles.post.create',
		'uses' => 'ArticlesController@store'
	]);

Route::get('/articles/edit/{id}',[
		'as'   => 'articles.edit',
		'uses' => 'ArticlesController@edit'
	]);

Route::get('/articles/{id}',[
		'as'   => 'articles',
		'uses' => 'ArticlesController@articles'
	]);

Route::post('/articles/{id}',[
		'as'   => 'articles.update',
		'uses' => 'ArticlesController@update'
	]);

Route::delete('/articles/{id}',[
		'as'   => 'articles.destroy',
		'uses' => 'ArticlesController@destroy'
	]);
/*nhom route test*/

Route::get('/test', 'TestController@index');

