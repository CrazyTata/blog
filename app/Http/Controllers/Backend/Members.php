<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Base;
use App\Http\Models\Backend\Member;
use App\Http\Models\Backend\Group;
use Illuminate\Support\Facades\Validator;
class Members extends Base
{
    //get member.index 
    public function index()
    {
        return view('backend.member.index');
    }
    //post  member.store  获取用户列表页数据
    public function store(Request $request)
    {
        return Member::getList($request->search??[],[$request->page,$request->size]);
    }

    //get  member.create  修改权限
    public function create(Request $request)
    {
        return Member::doUpdate($request->all());
    }

    //get back/member/{member} 展示添加用户页
    public function show()
    {
        return view('backend.member.addmember',['info'=>Group::getAllList()]);
    }

    //put back/member/{member}  
    public function update()
    {
        return 222222;
    }
    public function addMember(Request $request)
    {
        $valadate = Validator::make($input=$request->except(['_token']),[
            'name'=>'required',
            'password'=>'required|between:6,12|confirmed|alpha_num',
            'telephone'=>'required|digits:11',
            'user_group'=>'required|',
        ],[
            'name.required'=>'用户名必须填写',
            'password.required'=>'密码必须填写',
            'telephone.required'=>'电话必须填写',
            'user_group.required'=>'用户分组必须填写',
            'telephone.digits'=>'电话号码必须是11位的数字',
            'password.between'=>'密码的长度必须是6到12位',
            'password.alpha_num'=>'密码的长度必须是字母和数字组成',
        ]);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        unset($input['password_confirmation']);
        $input['password'] = md5(md5($input['password']));
        $input['true_name'] = $input['name'];
        $input['create_at'] = date('Y-m-d H:i:s');
        return Member::insertAll($input);
    }

    //delete back/member/{member}  
    public function destroy()
    {
        
    }

    //get  back/member/{member}/edit 
    public function edit()
    {
        return Group::getAllList();
    }
}
