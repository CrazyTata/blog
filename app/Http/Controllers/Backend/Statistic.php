<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @note Statistical management
 * @title Statistical-management
 * @button 1
 * @nav 2
 * @author: tata
 * @date: 2018/12/20 11:33
 */
class Statistic extends Controller
{
    public function index(){
        return view('backend.statistic.index');
    }
}
