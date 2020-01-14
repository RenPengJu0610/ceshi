<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function lists($sid,$name="iphone"){
        echo 'ID是：'.$sid.'</br>';
        echo 'name是:'.$name;
        return view('student');
    }
}
