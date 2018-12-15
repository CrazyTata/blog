<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
include_once (base_path().'\resources\org\Code.php');
class IndexController extends Controller
{
    private $code;
    public function __construct()
    {
     $this->code = new \Code();
    //         $this->middleware('guest')->except('logout');
    }

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
    public function setCode(){
        return $this->code->make();
    }
    public function getCode(){
        return $this->code->get();
    }
}