<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //show admin dashboard
    public function index(){
        return view('dashboard.index');
    }
}
