<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function index(){
        return view('Home.Index.index');
    }

//    public function index(){
//        return view('Home.Index.index');
//    }
//
//    public function index(){
//        return view('Home.Index.index');
//    }
}