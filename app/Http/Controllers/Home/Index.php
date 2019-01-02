<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Base;
use Illuminate\Support\Facades\View;
use App\Http\Models\Backend\Config;
use App\Http\Models\Backend\Friend;
class Index extends Base
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function index(){
        $boss = json_decode(Config::where('name','站长配置')->value('configs'),true);
        return view('Home.index',compact('boss'));
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