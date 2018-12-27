<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Backend\Config;
/**
 * @note System management
 * @title System-management
 * @button 1
 * @nav 2
 * @author: tata
 * @date: 2018/12/20 11:34
 */
class System extends Controller
{
    public function index()
    {
        return view('backend.system.index');
    }

    //网站的基本配置信息
    public function baseInfo(){
    	return Config::first()
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
        return Config::where('id',1)->update(['configs' => json_encode($request->except(['_token']))]);
    }
}
