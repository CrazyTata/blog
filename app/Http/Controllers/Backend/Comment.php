<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @note Comment-management  Statistical management
 * @title Comment-management
 * @button 1
 * @nav 2
 * @author: tata
 * @date: 2018/12/20 11:32
 */
class Comment extends Controller
{
    public function index()
    {
        return view('backend.comment.index');
    }

}
