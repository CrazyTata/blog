<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Category extends Model
{
    //
    protected $table='category';
    public $timestamps=false;

    public static function getList(array $where=[],array $limit=[1,50],array $order=['sort','desc']){
        $count = DB::table('category')
            ->where($where)
            ->count();
        if($count == 0) return ['count'=>0,'info'=>[]];
        return ['count'=>$count,'info'=>DB::table('category')
            ->where($where)
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
        if(false !== Db::table('category')->where('id',$id)->update($data)) return ['code'=>1,'msg'=>'修改成功'];
        return ['code'=>0,'msg'=>'发生未知错误，请稍后重试'];
    }

    public static function insertAll($data){
        if($id = Db::table('category')->where('name',$data['name'])->value('id')) {
            return ['code'=>0,'msg'=>'用户【'.$data['name'].'】在系统中已存在'];
        }
        if(false !== Db::table('category')->insert($data)) return ['code'=>1,'msg'=>'添加成功'];
        return ['code'=>0,'msg'=>'添加失败'];
    }   
}
