<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Base;
use Illuminate\Support\Facades\View;
use App\Http\Models\Backend\Config;
use App\Http\Models\Backend\Friend;
use App\Http\Models\Backend\Article;
use App\Http\Models\Backend\Category;
class Index extends Base
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function index(){
        $boss = json_decode(Config::where('name','站长配置')->value('configs'),true);
        $article = Article::getList(['is_delete'=>1]);
        $hit = Article::getList(['is_delete'=>1],[1,6],['number','desc']);
        $hot = Article::getList(['is_delete'=>1],[1,6],['id','desc']);
        $cate_url = '/cate';
        $cate = Category::getList(['is_del'=>1]);
        return view('Home.index',compact('boss','article','cate_url','cate','hit','hot'));
    }

    public function blog(){
        return view('Home.blog');
    }

    public function about(){
        return view('Home.about');
    }

    public function message(){
        return view('Home.message');
    }
}