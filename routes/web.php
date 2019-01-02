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

// Route::get('/', function () {
//     return view('welcome');
// });
//静态页面
// Route::view('/back/memberadd','backend\member\addmember')->name('index');
//Route::view('/blog','home\blog')->name('blog');
//Route::view('/about','home\about')->name('about');
//Route::view('/back','backend\index')->name('back');
// Route::get('/','Home\IndexController@index')->name('index');
// Route::get('/blog','Home\BlogController@index')->name('blog');
// Route::get('/about','Home\AboutController@index')->name('about');
// Route::get('/back','Back\IndexController@index')->name('back');
//后台路由组
Route::group(['prefix'=>'back','namespace'=>'Backend','middleware'=>['web','login']],function (){
    Route::get('/','Index@index');//首页
    Route::get('/welcome','Index@welcome')->name('welcome');//首页中的欢迎也
    Route::get('/logout','Index@logout');//退出页
    Route::get('/test','Product@test');
    //用户
    Route::post('/member/add','Members@addMember');
    Route::post('/member/doEdit','Members@doEdit');
    Route::resource('/member','Members');//用户页

    //博客管理
	Route::post('/product/add','Product@doAdd');
	Route::post('/product/edit','Product@doEdit');

	Route::get('/category','Product@category');
	Route::post('/category/list','Product@categoryList');
	Route::post('/category/modify','Product@modifyCategory');
	Route::post('/category/add','Product@addCategory');
	Route::any('/product/upload','Product@uploadFile');
	Route::resource('/product','Product');

    //评论管理

	Route::resource('/comment','Comment');
    //统计管理
	Route::resource('/statistics','Statistics');

    //系统管理
    Route::view('/system/boss','backend\system\boss');
    Route::view('/system/nav','backend\system\nav');
    Route::view('/system/link','backend\system\link');
	Route::view('/system/other','backend\system\other');
    Route::get('/system/navList','System@navList');
    Route::post('/system/addNav','System@addNav');
    Route::post('/system/modifyNav','System@modifyNav');

	Route::get('/system/linkList','System@linkList');
    Route::post('/system/addLink','System@addLink');
    Route::post('/system/modifyLink','System@modifyLink');

    Route::resource('/system','System');
    // Route::resource('/system','System');
    
});
Route::get('/back/setCode','Backend\Index@setCode');
Route::any('/back/login','Backend\Index@login');
Route::any('/back/modpass','Backend\Index@modifyPass');



//前台路由组

Route::group(['namespace'=>'Home','middleware'=>['web']],function (){
    Route::get('/','Index@index')->name('index');//首页
    Route::get('/blog','Index@blog')->name('blog');//文章
    Route::get('/about','Index@about')->name('about');//关于我
    Route::get('/message','Index@message')->name('message');//留言
    Route::get('/cate/{id}','Category@cate')->name('message');//留言
});