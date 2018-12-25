<?php

namespace App\Http\Models\Backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='article';
    public $timestamps=false;

    public static function getList(array $where,array $limit=[1,50],array $order=['id','desc']){
        $map = [];
        $map1 = [];
        if(!empty($where)){
            foreach ($where as $k=>$v){
                if(empty($v)) continue;
                if(in_array($k,['name','member_id','cate_id'])) $map[] = ['category.'.$k,$v];
                if($k=='title') $map1 = function ($query) {
                    $query->where('category.title', 'like', "%$v%")
                        ->orWhere('category.', 'like', "%$v%");
                };
                if($k=='time1') $map[] = ['category.create_at','>',$v.' 00:00:00'];
                if($k=='time2') $map[] = ['category.create_at','<',$v.' 23:59:59'];
            }
        }
        $count = DB::table('article')
            ->join('category','article.cate_id','category.id')
            ->join('user','article.member_id','user.id')
            ->join('images','article.image_id','images.id')
            ->where($map)
            ->where($map1)
            ->count();
        if($count == 0) return ['count'=>0,'info'=>[]];
        return ['count'=>$count,'info'=>DB::table('article')
            ->join('category','article.cate_id','category.id')
            ->join('user','article.member_id','user.id')
            ->join('images','article.image_id','images.id')
            ->select('article.*','user.name','category.name as cate_name','images.url as src')
            ->where($map)
            ->where($map1)
            ->offset(($limit[0]-1)*$limit[1])
            ->limit($limit[1])
            ->orderBy($order[0],$order[1])
            ->get()
        ];

    }

    public static function doUpdate($data)
    {
        $id = $data['id'];
        unset($data['id']);
        if(false !== Db::table('article')->where('id',$id)->update($data)) return ['code'=>1,'msg'=>'修改成功'];
        return ['code'=>0,'msg'=>'发生未知错误，请稍后重试'];
    }

    public static function insertAll($data){
        if($id = Db::table('article')->where('title',$data['title'])->value('id')) {
            return ['code'=>0,'msg'=>'用户【'.$data['title'].'】在系统中已存在'];
        }
        if(false !== Db::table('article')->insert($data)) return ['code'=>1,'msg'=>'添加成功'];
        return ['code'=>0,'msg'=>'添加失败'];
    }
}
