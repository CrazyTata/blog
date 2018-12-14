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
        return view('backend.index.index');
    }

    public function login(){
        return view('backend.index.login');
    }

    public function welcome(){
        return view('backend.index.welcome');
    }
    public function logout(){
        return view('backend.index.login1');
    }
}