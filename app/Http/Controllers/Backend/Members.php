<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Base;
use App\Http\Models\Backend\Member;
use App\Http\Models\Backend\Group;
use Illuminate\Support\Facades\Validator;
class Members extends Base
{
    /**
     * @note User Management
     * @title User-Manage
     * @button 1
     * @nav 2
     * @author: tata
     * @date: 2018/12/20 10:32
     */
    public function index()
    {
        return view('backend.member.index');
    }

    /**
     * @note get user manage data  [post]  member.store
     * @title get data
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2018/12/20 10:33
     */
    public function store(Request $request)
    {
        return Member::getList($request->search??[],[$request->page,$request->size]);
    }

    /**
     * @note modify user can access or not [get]  member.create
     * @title Manage-Delete
     * @button 2
     * @nav 1
     * @author: tata
     * @date: 2018/12/20 10:34
     */
    public function create(Request $request)
    {
        return Member::doUpdate($request->all());
    }



    /**
     * @note page add member index [get] back/member/{member}
     * @title Manage-Add
     * @button 2
     * @nav 1
     * @author: tata
     * @date: 2018/12/20 10:36
     */
    public function show()
    {
        return view('backend.member.addmember',['info'=>Group::getAllList()]);
    }

    //put back/member/{member}  
    public function update()
    {
        return 222222;
    }

    /**
     * @note do add member
     * @title Do-Manage-Add
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2018/12/20 10:38
     */
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

    /**
     * @note get all group list  [get]  back/member/{member}/edit
     * @title group-list
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2018/12/20 10:30
     */
    public function edit()
    {
        return Group::getAllList();
    }

    /**
     * @note do save edit manage info
     * @title Manage-Edit
     * @button 2
     * @nav 1
     * @author: tata
     * @date: 2018/12/20 11:08
     */
    public function doEdit(Request $request){
         $valadate = Validator::make($input=$request->except(['_token']),[
            'name'=>'required',
            'telephone'=>'required|digits:11',
            'user_group'=>'required|',
            'id'=>'required'
        ],[
            'name.required'=>'用户名必须填写',
            'telephone.required'=>'电话必须填写',
            'user_group.required'=>'用户分组必须选择',
            'telephone.digits'=>'电话号码必须是11位的数字',
            'id.required'=>'必须含有用户id'
        ]);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        return Member::doUpdate($input);
    }
}
