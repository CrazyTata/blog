<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    //
    protected $table='group';
    public $timestamps=false;

    public static function getAllList(){
        return Db::table('group')->where('is_delete',1)->get();
    }


    public static function doUpdate($data)
    {
      
    }
}
