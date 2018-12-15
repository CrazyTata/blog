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
//Route::view('/','home\Index')->name('index');
//Route::view('/blog','home\blog')->name('blog');
//Route::view('/about','home\about')->name('about');
//Route::view('/back','backend\index')->name('back');
// Route::get('/','Home\IndexController@index')->name('index');
// Route::get('/blog','Home\BlogController@index')->name('blog');
// Route::get('/about','Home\AboutController@index')->name('about');
// Route::get('/back','Back\IndexController@index')->name('back');
//后台路由组
Route::group(['prefix'=>'back','namespace'=>'Backend','middleware'=>['web']],function (){
    Route::get('/','IndexController@index');
    Route::get('/welcome','IndexController@welcome')->name('welcome');
    Route::get('/setCode','IndexController@setCode');
    Route::get('/getCode','IndexController@getCode');
});
Route::get('/back/login','Backend\IndexController@login');
Route::get('/back/logout','Backend\IndexController@logout');
//前台路由组
Route::group(['namespace'=>'Home','middleware'=>['web']],function (){
    Route::get('/','IndexController@index')->name('index');
    Route::get('/blog','IndexController@blog')->name('blog');
    Route::get('/about','IndexController@about')->name('about');
});