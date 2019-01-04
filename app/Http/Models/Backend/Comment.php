<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    //
    protected $table='comment';
    public $timestamps=false;

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
