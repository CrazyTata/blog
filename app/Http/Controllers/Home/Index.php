<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Base;
use Illuminate\Support\Facades\View;
use App\Http\Models\Backend\Nav;

class Index extends Base
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function index(){
        $nav=Nav::where('is_delete',1)->orderBy('sort','desc')->get();

        return view('Home.index',compact('nav'));
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