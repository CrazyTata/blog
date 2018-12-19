<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    //
    protected $table='user';
    public $timestamps=false;

    public static function getList(array $where,array $limit=[1,50],array $order=['id','desc']){
        $map = [];
        if(!empty($where)){
            foreach ($where as $k=>$v){
                if(empty($v)) continue;
                if(in_array($k,['name','telephone'])) $map[] = ['user.'.$k,$v];
                if($k=='time1') $map[] = ['user.create_at','>',$v.' 00:00:00'];
                if($k=='time2') $map[] = ['user.create_at','<',$v.' 23:59:59'];
            }
        }
        $count = DB::table('user')
            ->join('group','user.user_group','group.id')
            ->select('user.*','group_name')
            ->where($map)
            ->count();
        if($count == 0) return ['count'=>0,'info'=>[]];   
        return ['count'=>$count,'info'=>DB::table('user')
        ->join('group','user.user_group','group.id')
        ->select('user.*','group_name')
        ->where($map)
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
        if(false !== Db::table('user')->where('id',$id)->update($data)) return ['code'=>1,'msg'=>'修改成功'];
        return ['code'=>0,'msg'=>'发生未知错误，请稍后重试'];
    }

    public static function insertAll($data){
        if($id = Db::table('user')->where('name',$data['name'])->value('id')) {
            return ['code'=>0,'msg'=>'用户【'.$data['name'].'】在系统中已存在'];
        }
        if(false !== Db::table('user')->insert($data)) return ['code'=>1,'msg'=>'添加成功'];
        return ['code'=>0,'msg'=>'添加失败'];
    }   
}
