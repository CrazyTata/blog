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
    Route::get('/test','Index@test');
    Route::post('/member/add','Members@addMember');
    Route::resource('/member','Members');//用户页


});
Route::get('/back/setCode','Backend\Index@setCode');
Route::any('/back/login','Backend\Index@login');
Route::any('/back/modpass','Backend\Index@modifyPass');



//前台路由组

Route::group(['namespace'=>'Home','middleware'=>['web']],function (){
    Route::get('/','IndexController@index')->name('index');
    Route::get('/blog','IndexController@blog')->name('blog');
    Route::get('/about','IndexController@about')->name('about');
});