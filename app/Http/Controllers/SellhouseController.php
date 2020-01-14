<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellHouse;
class SellhouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   =   SellHouse::get();
        return view('admin/house/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/house/create');
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
        if($request->hasFile('house_img')){
            $post['house_img']  =   upload('house_img');
        }
        if(isset($post['house_imgs'])){
            $post['house_imgs'] =   moreuploads('house_imgs');
            $post['house_imgs'] =   implode('|',$post['house_imgs']);
        }
        $res    =   SellHouse::insert($post);
        if($res){
            return redirect('house/index');
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
    public function product($id)
    {
        $data   =   SellHouse::where('house_id','=',$id)->get();
        foreach($data as $v){
            $v->house_imgs=explode('|',$v->house_imgs);
        }
        return view('admin/house/product',['data'=>$data]);
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
        $res    =   SellHouse::destroy($id);
        if($res){
            if(request()->ajax()){
                echo json_encode(['erron'=>200,'msg'=>'删除成功']);die;
            }else{
                 return redirect('article/index');
            }
           
        }
    }
}
