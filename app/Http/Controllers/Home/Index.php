<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Base;
use Illuminate\Support\Facades\View;
use App\Http\Models\Backend\Config;
use App\Http\Models\Backend\Friend;
use App\Http\Models\Backend\Article;
use App\Http\Models\Backend\Category;
use App\Http\Models\Backend\Comment;
use Illuminate\Http\Request;
class Index extends Base
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    protected $product_url = '/p';
    protected $cates = '/c';
    public function index(){
        $boss     = json_decode(Config::where('name','站长配置')->value('configs'),true);
        $article  = Article::getList(['is_delete'=>1]);
        $hit      = Article::getList(['is_delete'=>1],[1,6],['number','desc']);
        $hot      = Article::getList(['is_delete'=>1],[1,6],['id','desc']);
        $cate_url = $this->product_url;
        $cate     = Category::getList(['is_del'=>1]);
        return view('Home.index',compact('boss','article','cate_url','cate','hit','hot'));
    }

    public function blog(){
        return view('Home.blog');
    }

    public function about(){
        return view('Home.about');
    }

    public function message($id=0){
        $comment = [];
        if(empty($id)) $comment = Comment::where([['article_id','=',0],['is_delete','=',1]])->get();
        return view('Home.message',compact('comment','id'));
    }

    public function product($id){
        $data = Article::getList(['id'=>$id]) ['info'][0];
        $pre = Article::where(['id'=>$id-1,'is_delete'=>1])->first();
        $nex = Article::where(['id'=>$id+1,'is_delete'=>1])->first();
        $other_article = Article::where([['cate_id','=',$data->cate_id],['is_delete','=',1],['id','<>',$id]])->get();
        $product_url = $this->product_url;
        $comment = Comment::where([['article_id','=',$id],['is_delete','=',1]])->get();
        Article::where(['id'=>$id])->increment('number');
        return view('Home.info',compact('data','product_url','pre','nex','other_article','comment'));
    }

    public function addMessage(Request $request){
        $data = $request->except(['_token']);
        if(empty($data['note'])) return ['code'=>0,'msg'=>'请填写留言'];
        $info = [
            'article_id'=>$data['id'],
            'content'=>$data['note'],
            'create_at'=>date('Y-m-d H:i:s'),
            'update_at'=>date('Y-m-d H:i:s')
        ];
        if(false!==Comment::insert($info)) return ['code'=>1,'msg'=>'提交成功'];
        return ['code'=>0,'msg'=>'发生未知错误，请稍后重试'];
    }
}