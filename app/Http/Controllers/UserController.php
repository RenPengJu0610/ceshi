<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class UserController extends Controller
{
    public function login(){

        return view('admin/user/login');
    }
    public function store(){
        $post   =   request()->except('_token');
        $res    =   Users::where($post)->first();
        if($res){
            session(['userinfo'=>$res]);
            request()->session()->save();
            return redirect('show');
        }else{
            return redirect('login')->with('msg','账号密码不正确，请登录');
        }
    }
    public function show(){
        $userinfo   =   session('userinfo');
        // dd($userinfo);
        return view('admin/user/userinfo',['userinfo'=>$userinfo]);
    }
}
