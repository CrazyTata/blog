<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
include_once (base_path().'\resources\org\Code.php');
class IndexController extends Base
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

    public function login(Request $request){
//        dd($request);
        if($request->isMethod('post')){
            dd($request['username']);
        }else{
            return view('backend.index.login');
        }
//        return view('backend.index.login');
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