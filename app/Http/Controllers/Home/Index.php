<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Base;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use App\Http\Models\Backend\Config;
use App\Http\Models\Backend\Friend;
use App\Http\Models\Backend\Article;
use App\Http\Models\Backend\Category;
use App\Http\Models\Backend\Comment;
use Illuminate\Http\Request;
use App\Http\Models\Backend\Images;

/**
 * @note home base index
 * @title home base index
 * @button 1
 * @nav 1
 * @author: tata
 * @date: 2019/1/8 13:37
 */
class Index extends Base
{
    /*
     * products base url
     */
    protected $product_url = '/p';
    /*
     * category base url
     */
    protected $cates = '/c';

    /**
     * @note home index method
     * @title home index method
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2019/1/8 13:40
     */
    public function index(){
        $article  = Article::getList(['is_delete'=>1]);                                      //all article
        $boss     = Cache::remember('bosss', 30, function () {
            return json_decode(Config::where('name','站长配置')->value('configs'),true);//boss config
        });
        $hit     = Cache::remember('hits', 5, function () {
            return Article::getList(['is_delete'=>1],[1,6],['number','desc']);//article by hit
        });
        $hot     = Cache::remember('hots', 10, function () {
            return Article::getList(['is_delete'=>1],[1,6],['id','desc']);//article by reply
        });
        $banner     = Cache::remember('banners', 300, function () {
            return Images::where([['is_delete','=',1],['types','=',0]])->select('id','url','desc')->orderBy('id','desc')->limit(3)->get();
        });
        $cate_url = $this->product_url;
        $cates_url = $this->cates;
        $category  = Cache::remember('cates', 300, function () {
            return Category::getList(['is_del'=>1]);
        });
        // return $category;
        return view('home.index',compact('boss','article','cate_url','cates_url','category','hit','hot','banner'));
    }

    /**
     * @note about me
     * @title about me
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2019/1/8 13:42
     */
    public function about(){
        return view('home.about');
    }

    /**
     * @note show all comment messages
     * @title show messages
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2019/1/8 13:42
     */
    public function message($id=0){
        $comment = [];
        if(empty($id)) $comment = Comment::where([['article_id','=',0],['is_delete','=',1]])->get();
        return view('home.message',compact('comment','id'));
    }

    /**
     * @note show product detail by id
     * @title product detail
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2019/1/8 13:42
     */
    public function product($id){
        $data = Article::getList(['id'=>$id]) ['info'][0];
        $pre = Article::where(['id'=>$id-1,'is_delete'=>1])->first();
        $nex = Article::where(['id'=>$id+1,'is_delete'=>1])->first();
        $other_article = Article::where([['cate_id','=',$data->cate_id],['is_delete','=',1],['id','<>',$id]])->get();
        $product_url = $this->product_url;
        $comment = Comment::where([['article_id','=',$id],['is_delete','=',1]])->get();
        Article::where(['id'=>$id])->increment('number');
        return view('home.info',compact('data','product_url','pre','nex','other_article','comment'));
    }

    /**
     * @note do add comments
     * @title add comments
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2019/1/8 13:43
     */
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