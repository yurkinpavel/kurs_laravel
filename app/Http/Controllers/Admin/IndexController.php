<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function page2(){
        return view('admin/page2');
    }

    public function page3(){
        return view('admin.page3');
    }
}
