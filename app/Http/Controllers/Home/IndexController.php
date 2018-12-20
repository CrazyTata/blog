<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Backend\Base;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class IndexController extends Base
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function index(){
        return view('Home.index');
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