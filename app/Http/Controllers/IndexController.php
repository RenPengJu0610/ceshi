<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $name   =   '任鹏举:';
        return view('beijing',['name'=>$name]);
    }
    public function login(){
         $get    =   request()->all();
       
        return view('login');
    }
    public function dologin(){
        $get    =   request()->all();
        dump($get);
    }
}
