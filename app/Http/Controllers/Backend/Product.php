<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Backend\Category;
use App\Http\Models\Backend\Article;
use App\Http\Models\Backend\Images;
use App\Http\Controllers\Backend\Base;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
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
    private $validate_field = [
            'cate_id'=>'required|numeric',
            'content'=>'required',
            'sort'=>'required|numeric',
            'src'=>'required',
            'title'=>'required',
            'key_words'=>'required'
        ];
    private $validate_msg = [
            'cate_id.required'=>'分类必须选择',
            'content.required'=>'文章内容必须填写',
            'sort.required'=>'排序必须填写',
            'src.required'=>'图片必须上传',
            'title.required'=>'标题必须填写',
            'key_words.required'=>'关键词必须填写',
            'cate_id.numeric'=>'分类必须是数字',
            'sort.numeric'=>'排序必须是数字'
        ];
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
        $info = Article::getList($request->search??[],[$request->page,$request->size]);
        $category = Category::getList(['is_del'=>1],[1,1000]);
        return compact('info','category');
    }

    public function test(){
        return view('backend.product.test');
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
        return Article::doUpdate($request->all());
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
    public function doAdd(Request $request)
    {
        //validate form
        $valadate = Validator::make($input=$request->except(['_token']),$this->validate_field,$this->validate_msg);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
        $input['member_id'] = session('user') ['id'];
        $input['update_at'] = date('Y-m-d H:i:s');
        $input['create_at'] = date('Y-m-d H:i:s');
        $image['url'] = $input['src'];
        $image['b_url'] = $input['bigSrc'];
        $image['s_url'] = $input['smallSrc'];
        $image['desc'] = '博客图片';
        $image['types'] = 1;
        unset($input['src']);
        //save image than save article info
        if($img_id=Images::insertAll($image)){
            $input['image_id'] = $img_id;
            return Article::insertAll($input);
        }
        return ['code'=>0,'msg'=>'图片保存错误'];

        
        
    }

    public function uploadFile(Request $request){
        $types = '';
        if($request->has('type')) $types = $request->type;
        $file = $_FILES['file'];
        $res = uploadFile('./upload/product/',$file,$types);
        if(isset($res['code'])) return $res;
        else return ['code'=>0,'msg'=>'网络错误，请稍后重试'];
    }
    // public function uploadFile(Request $request){
    //     return Image::make($request->file('file'))->resize(300, 200)->save('./upload/product/a.jpg');
    // }
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
        $valadate = Validator::make($input=$request->only(['cate_id','content','id','image_id','key_words','sort','src','title','bigSrc','smallSrc']),$this->validate_field,$this->validate_msg);
        if($valadate->fails()) return ['code'=>0,'msg'=>$valadate->errors()->first()]; 
         $input['member_id'] = session('user') ['id'];
        $input['update_at'] = date('Y-m-d H:i:s');
        $image['url'] = $input['src'];
        $image['b_url'] = $input['bigSrc'];
        $image['s_url'] = $input['smallSrc'];
        $image['desc'] = '博客图片';
        $image['types'] = 1;
        $image_id = $input['image_id'];
        unset($input['src']);
        unset($input['bigSrc']);
        unset($input['smallSrc']);
        $image_info = Images::getInfoById($image_id);
        DB::beginTransaction();
        try{
            if($image_info->url!=$image['url']){
                //delete image from database
                Images::doDelete($image_id);   
                // insert a new info to database
                $img_id = Images::insertAll($image);
                unset($input['image_id']);
                $input['image_id'] = $img_id;
                //delete the image file
                @unlink($image_info->url);
            }
            // update the article
            Article::doUpdate($input);
            DB::commit();
            return ['code'=>1,'msg'=>'操作成功'];
        }catch(\Execption $e){
            DB::rollBack();
            return ['code'=>0,'msg'=>$e->getMessage()];
        }
        
       
       
        return Article::doUpdate($input);
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
