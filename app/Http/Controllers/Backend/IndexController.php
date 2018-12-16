<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Backend\Member;
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
            $name = $request['username']??'';
            $password = $request['password']??'';
            $code = $request['code']??'';
            if(!$name || $password || $code) echo json_encode(['code'=>0,'msg'=>'请先填写用户名密码和验证码']);
            $info = Member::first();
            dd($info);die;
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
        $info = Member::first();
        dd($info);die;
        return view('backend.index.login1');
    }
    public function setCode(){
        return $this->code->make();
    }
    public function getCode(){
        return $this->code->get();
    }
}