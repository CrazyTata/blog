<?php

namespace App\Http\Controllers\Backend;

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

    public function login(){
        return view('Home.Index.index');
    }

    public function logout(){
        return view('Home.Index.index');
    }
}