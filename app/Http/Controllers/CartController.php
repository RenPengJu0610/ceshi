<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res    =   Cart::get();
        $arr    =   $this->contentform($res);
        return view('admin/cart/index',['arr'=>$arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // showMsg(1,'Hello World!');
        $res    =   Cart::get();

        $arr    =   $this->contentform($res);
        return view('admin/cart/create',['arr'=>$arr]);
    }
    public function contentform($data,$pid=0,$level=0){
        static $arr     =   [];
        $level  =   $level+1;
        foreach($data as $v){
            if($pid == $v->pid){
                $v['level'] =   $level;
                $arr[]      =   $v;
                $this->contentform($data,$v->cart_id,$level);
            }
        }
        return $arr;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post   =   $request->except('_token');
        $res    =   Cart::insert($post);
        if($res){
            return redirect('cart/index');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data   =   Cart::find($id);
        $res    =   Cart::get();
        $arr    =   $this->contentform($res);
        return view('admin/cart/edit',['data'=>$data,'arr'=>$arr]);
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
        $post   =   $request->except('_token');
        $res    =   Cart::where('cart_id',$id)->update($post);
        if($res !==false){
            return redirect('cart/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count  =   Cart::where('pid','=',$id)->count();
        if($count){
           return redirect('cart/index')->with('msg','不能擅长的');
            // echo "<script>alert('no');location.href='/cart/index';</script>";exit;
        }
        $res    =   Cart::destroy($id);
        if($res){
            return redirect('cart/index');
        }
    }
}
