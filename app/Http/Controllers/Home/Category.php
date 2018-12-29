<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Backend\Base;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class Category extends Base
{

    public function cate($id){
        return $id;
    }

}