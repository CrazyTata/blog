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
Route::view('/','home\Index')->name('index');
Route::view('/blog','home\blog')->name('blog');
Route::view('/about','home\about')->name('about');
Route::view('/back','backend\index\index')->name('back');
Route::view('/welcome','backend\index\welcome')->name('welcome');

Route::group(['prefix'=>'home','namespace'=>'Home'],function (){
    Route::resource('detail','DetailController');
    Route::resource('blog','BlogController');
});
// Route::get('/','Home\IndexController@index')->name('index');
// Route::get('/blog','Home\BlogController@index')->name('blog');
// Route::get('/about','Home\AboutController@index')->name('about');
// Route::get('/back','Back\IndexController@index')->name('back');