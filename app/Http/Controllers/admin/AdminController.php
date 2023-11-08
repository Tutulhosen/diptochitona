<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //show admin dashboard
    public function index(){
        return view('dashboard.index');
    }

    //show login page
    public function login_page(){
        return view('dashboard.login');
    }

    //login process
    public function login(Request $request){
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect()->route('admin.dashboard.index');
        }else{
            return back()->with('error', 'Invalid email or password');
        }
    }

    //logout process
    public function logout(){
        Auth::logout();
        return redirect()->route('login.page');
    }
}
