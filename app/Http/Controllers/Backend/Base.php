<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Backend\Config;
use Illuminate\Http\Request;

class Base extends Controller
{
	protected $defaultPic = '';
	
	public function __construct(){
		$info = json_decode(Config::where('name','基本配置')->value('configs'),true);
		$this->defaultPic = $info['src'];
	}
    //获取基本配置信息
    //name 基本  站长   其它
    public function getConfig($id){
    	$id--;
    	$names = ['基本配置','站长配置','其它配置'];
    	$name = $names[$id];
    	return json_decode(Config::where('name',$name)->value('configs'),true);
    }

}
