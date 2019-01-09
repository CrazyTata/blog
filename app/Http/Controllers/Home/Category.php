<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Backend\Base;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class Category extends Base
{

    /**
     * @note show products by category id
     * @title show products
     * @button 1
     * @nav 1
     * @author: tata
     * @date: 2019/1/8 13:51
     */
    public function cate($id){
        return view('home.list');
    }

}