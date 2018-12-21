<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Backend\Category;
use App\Http\Models\Backend\Article;
use App\Http\Controllers\Backend\Base;
use Illuminate\Support\Facades\Validator;
/**
 * @note Product management
 * @title Product-management
 * @button 1
 * @nav 2
 * @author: tata
 * @date: 2018/12/20 11:33
 */
class Product extends Base
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
        return view('backend.product.index');
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
        return Article::getList($request->search??[],[$request->page,$request->size]);
    }

    public function test(){
        return Article::getList([],[1,10]);
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

    }

    public function category(){
        return view('backend.product.category');
    }

    public function categoryList(Request $request){
        return Category::getList([],[$request->page,$request->size]);
    }

    public function modifyCategory(Request $request){
        if($request->is_del) return Category::doUpdate($request->except(['_token']));
        $valadate = Validator::make($input=$request->except(['_token']),[
            'name'=>'required',
            'sort'=>'required|numeric',
            'description'=>'required',
        ],[
            'name.required'=>'分类名必须填写',
            'sort.required'=>'排序必须填写',
            'sort.numeric'=>'排序必须填写数字',
            'description.required'=>'描述必须填写'
        ]);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        return Category::doUpdate($input);
    }

    public function addCategory(Request $request){
        $valadate = Validator::make($input=$request->except(['_token']),[
            'name'=>'required',
            'sort'=>'required|numeric',
            'description'=>'required',
        ],[
            'name.required'=>'分类名必须填写',
            'sort.required'=>'排序必须填写',
            'sort.numeric'=>'排序必须填写数字',
            'description.required'=>'描述必须填写'
        ]);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        return Category::insertAll($input);
    }
}