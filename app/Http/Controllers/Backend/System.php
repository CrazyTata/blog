<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
