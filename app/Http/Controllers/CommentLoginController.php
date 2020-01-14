<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class CommentLoginController extends Controller
{
    //登陆页面
    public function login(){
        return view('admin/commentlogin/login');
    }
    public function store(){
        $post   =   request()->except('_token');
        $res    =   Users::where($post)->first();
        // dd($res);
        if($res){
            session(['userinfo'=>$res]);
            request()->session()->save();
            return redirect('comment/create');
        }else{
            return redirect('login')->with('msg','账号密码不正确，请登录');
        }
    }
    public function exits(){
        session(['userinfo'=>null]);
        request()->session()->save();
        return redirect('login');
    }
}
