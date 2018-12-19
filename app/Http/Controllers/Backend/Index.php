<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Backend\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
include_once (base_path().'\resources\org\Code.php');
class Index extends Base
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
            session(['user'=>$info]);
            $ips = getIp();
            if(is_array($ips)) $ip = $ips[0];
            else $ip = $ips;
            Member::where('id',$info['id'])->update(['load_time'=>date('Y-m-d H:i:s'),'ip'=>$ip]);
            return redirect('/back');
        }else{
            return view('backend.index.login');
        }
    }
    public function test(){
        dd(getIp());
    }

    public function welcome(){
        return view('backend.index.welcome');
    }
    public function logout(){
        session(['user'=>null]);
        return redirect('/back/login');
    }
    public function setCode(){
        return $this->code->make();
    }

    /**
     * 修改密码
     * @param Request $request
     * @return array|bool
     */
    public function modifyPass(Request $request){
//        $ruler = [
//            'name'=>'require',
//            'password1'=>'password1',
//            'password2'=>'password2',
//            'password3'=>'password3',
//        ];
//        $msg = [
//            'name.require'=>'用户必须填写',
//            'password1.require'=>'原密码必须填写',
//            'password2.require'=>'新密码必须填写',
//            'password3.require'=>'新密码必须填写',
//        ];
//        $validate = Validator::make($request->all(), [
//            'name' => 'required',
//            'password1' => 'required',
//        ]);
//        if ($validator->fails()) {
//            return redirect('post/create')
//                ->withErrors($validator)
//                ->withInput();
//        }
//        $validate = Validator::make($request->all(),$ruler,$msg);
//        if($validate->fails()){
//            return $validate->withErrors($validate);
//        }else{
//            return 'ok';
//        }
        $name = $request->name;
        $password1 = $request->password1;
        $password2 = $request->password2;
        $password3 = $request->password3;
        if(empty($name)||empty($password1)||empty($password2)||empty($password3)) return ['code'=>0,'msg'=>'请把表单填写完整'];
        if($password3!=$password2) return ['code'=>0,'msg'=>'确认密码跟新密码不一致'];
        $value = Member::where(['name'=>$name])->first();
        $n_password = md5(md5($password2));
        if($value['password'] != md5(md5($password1)))return ['code'=>0,'msg'=>'原密码输入错误'];
        if($password1 == $password2) return ['code'=>0,'msg'=>'原密码跟新密码一致'];
        $value['password'] = $n_password;
        $res = Member::where(['name'=>$name])->update(['password'=>$n_password]);
        if(false !== $res) return ['code'=>1,'msg'=>'修改成功'];
        return ['code'=>0,'msg'=>'发生未知错误，请稍后重试'];
    }
}