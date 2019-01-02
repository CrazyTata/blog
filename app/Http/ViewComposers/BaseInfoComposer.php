<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Models\Backend\Nav;
use App\Http\Models\Backend\Config;
use App\Http\Models\Backend\Friend;

class BaseInfoComposer
{
    /**
     *  将数据绑定到视图。
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'nav'=>Nav::where('is_delete',1)->orderBy('sort','desc')->get(),
            'base'=>json_decode(Config::where('name','基本配置')->value('configs'),true),
            'links'=>Nav::where('is_delete',1)->orderBy('sort','desc')->get()
            ]);
    }
}