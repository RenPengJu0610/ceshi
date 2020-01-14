<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\News;
use Illuminate\Support\Facades\Cache;
class Newcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_name   =   request()->new_name;
        $page   =   request()->page?:1;
        $query      =   request()->all();
        $data   =   Cache::get('key_'.$page.'_'.$new_name);
        if(!$data){
            echo '没缓存';
            $where      =   [];
            if($new_name){
                $where[]    =   ['new_name','like','%'.$new_name.'%'];
            }
            $data   =   News::leftjoin('cart','new.cart_id','=','cart.cart_id')
                                ->where($where)
                                ->paginate(3);
            Cache::put('key_'.$page.'_'.$new_name,$data,300); 
       }
        if(request()->ajax()){
            return view('admin/new/ajaxindex',['data'=>$data,'query'=>$query]);
        }

        return view('admin/new/index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data   =   Cart::get();
        return view('admin/new/create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'new_name' => 'required|unique:new|max:255|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'new_author' => 'required',
        ],[
            'new_name.required' =>'新闻名称必填',
            'new_author.required' =>  '新闻作者必填',
            'new_name.unique' =>'新闻名称已存在',
            'new_name.regex'  =>   '需是中文、字母、数字、下划线组成'


        ]);
        $post   =   $request->except('_token');
        $res    =   News::insert($post);
        if($res){
            return redirect('new/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
