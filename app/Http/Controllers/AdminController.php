<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }

    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogin(Request $request){
//        dd($request->all());
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'],'password'=> $check['password']])){
            return redirect()->route('admin.dashboard')->with('error','Admin Successfully Login');
        }else{
            return back()->with('error','Invalid Email or Password');
        }
    }
}
