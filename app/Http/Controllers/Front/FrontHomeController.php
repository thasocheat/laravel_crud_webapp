<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Home\Departments;
use App\Http\Controllers\Controller;

class FrontHomeController extends Controller
{
    public function index()
    {
        $data['departments'] = Departments::all();
        return view('frontpage.home.index',$data);
    }
}
