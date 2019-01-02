<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Backend\Config;
use App\Http\Models\Backend\Nav;
use App\Http\Models\Backend\Friend;
use Illuminate\Support\Facades\Validator;
/**
 * @note System management
 * @title System-management
 * @button 1
 * @nav 2
 * @author: tata
 * @date: 2018/12/20 11:34
 */
class System extends Base
{
	protected $validate=[
		'name'=>'required',
		'sort'=>'required|numeric',
		'description'=>'required',
		'url'=>'required',
		'title'=>'required'
	];
	protected $message=[
		'name.required'=>'导航名必须填写',
		'sort.required'=>'排序必须填写',
		'sort.numeric'=>'排序必须是数字',
		'description.required'=>'描述必须填写',
		'url.required'=>'链接必须填写',
		'title.required'=>'标题必须填写'
	];
    protected $validateLink=[
        'name'=>'required',
        'link'=>'required'
    ];
    protected $messageLink=[
        'name.required'=>'导航名必须填写',
        'link.required'=>'链接必须填写'
    ];
    public function index()
    {
        return view('backend.system.index');
    }

    //网站的基本配置信息
    public function show($id){
    	return $this->getConfig($id);
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
    	$id = $request->only(['id']);
        if(false !== Config::where('id',$id)->update(['configs' => json_encode($request->except(['_token','id']),JSON_UNESCAPED_UNICODE)])) return ['code'=>1,'msg'=>'保存成功！'];
        else return ['code'=>0,'msg'=>'保存失败！'];
    }

    public function navList(){
    	$info = [];
    	if($count=Nav::count()) $info = Nav::orderBy('sort','desc')->get();
    	return compact('count','info');
    }

    public function modifyNav(Request $request){
    	if ($request->has('is_delete'))  {
    		if(false!==Nav::where('id',$request->id)->update($request->except(['_token','id']))) return ['code'=>1,'msg'=>'修改成功'];
			else return ['code'=>0,'msg'=>'修改失败'];
		}
    	$valadate = Validator::make($input=$request->except(['_token']),$this->validate,$this->message);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        if(false!==Nav::where('id',$request->id)->update($request->except(['_token','id']))) return ['code'=>1,'msg'=>'修改成功'];
        return ['code'=>0,'msg'=>'修改失败'];
    }

    //add nav
    public function addNav(Request $request){
    	$valadate = Validator::make($input=$request->except(['_token']),$this->validate,$this->message);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        if($id = Nav::where('name',$request->name)->value('id')) return ['code'=>0,'msg'=>'此导航在系统中已经存在'];
        if(Nav::insertGetId($request->except(['_token']))) return ['code'=>1,'msg'=>'添加成功'];
        return ['code'=>0,'msg'=>'网络错误，请稍后重试'];
    }

    public function linkList(){
    	$info = [];
    	if($count=Friend::count()) $info = Friend::orderBy('sort','desc')->get();
    	return compact('count','info');
    }

    public function modifyLink(Request $request){
    	if ($request->has('is_delete'))  {
    		if(false!==Friend::where('id',$request->id)->update($request->except(['_token','id']))) return ['code'=>1,'msg'=>'修改成功'];
			else return ['code'=>0,'msg'=>'修改失败'];
		}
    	$valadate = Validator::make($input=$request->except(['_token']),$this->validateLink,$this->messageLink);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        if(false!==Friend::where('id',$request->id)->update($request->except(['_token','id']))) return ['code'=>1,'msg'=>'修改成功'];
        return ['code'=>0,'msg'=>'修改失败'];
    }

    //add nav
    public function addlink(Request $request){
    	$valadate = Validator::make($input=$request->except(['_token']),$this->validateLink,$this->messageLink);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        if($id = Friend::where('name',$request->name)->value('id')) return ['code'=>0,'msg'=>'此链接在系统中已经存在'];
        if(Friend::insertGetId($request->except(['_token']))) return ['code'=>1,'msg'=>'添加成功'];
        return ['code'=>0,'msg'=>'网络错误，请稍后重试'];
    }
}
