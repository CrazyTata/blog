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
        if($request->isMethod('post')){
            $name = $request['username']??'';
            $password = $request['password']??'';
            $code = $request['code']??'';
            if(!$name || !$password || !$code) return back()->with('msg','请输入用户名密码以及验证码');
            if(strtolower($this->code->get()) != strtolower($code)) return back()->with('msg','验证码错误');
            $info = Member::where(['name'=>$name])->first();
            if(empty($info['id'])) return back()->with('msg','用户名不存在');
            if($info['password']!=md5(md5($password))) return back()->with('msg','密码错误');
            session('user',$info);
            Member::where('id',$info['id'])->update(['load_time'=>date('Y-m-d H:i:s')]);
            return redirect('/back');
        }else{
            return view('backend.index.login');
        }
    }

    public function welcome(){
        return view('backend.index.welcome');
    }
    public function logout(){
        dd($_SERVER);die;
        return view('backend.index.login1');
    }
    public function setCode(){
        return $this->code->make();
    }
    public function getCode(){
        return $this->code->get();
    }
}