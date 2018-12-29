<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Base;
use Illuminate\Support\Facades\View;
use App\Http\Models\Backend\Nav;

class Composer
{
    public function composer(){
        return Nav::where('is_delete',1)->orderBy('sort','desc')->get();

    }

}