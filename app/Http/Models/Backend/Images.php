<?php

namespace App\Http\Models\Backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table='images';
    public $timestamps=false;

    public static function doUpdate($data){
        $id = $data['id'];
        unset($data['id']);
        if(false !== Db::table('images')->where('id',$id)->update($data)) return ['code'=>1,'msg'=>'修改成功'];
        return ['code'=>0,'msg'=>'发生未知错误，请稍后重试'];
    }

    public static function insertAll($data){
        return Db::table('images')->insertGetId($data);
    }

    public static function doDelete($id){
        return Db::table('images')->where('id', $id)->delete();
    }

    public static function getInfoById($id){
        return Db::table('images')->where('id', $id)->first();
    }
}
