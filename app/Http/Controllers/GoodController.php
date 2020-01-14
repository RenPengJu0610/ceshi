<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data    =   Goods::paginate(3);
       if(request()->ajax()){
        return view('admin/good/ajaxindex',['data'=>$data]);
       }else{
        return view('admin/good/index',['data'=>$data]);
       }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/good/create');
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
        if($request->hasFile('goods_img')){
            $post['goods_img']  =   $this->upload('goods_img');
        }
        $res    =   Goods::insert($post);
        if($res){
            return redirect('good/index');
        }
    }
    public function upload($filename){
        if ( request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $extension = $photo->extension();
            $store_result = $photo->store('uploads');
            return $store_result;
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
       $res     =   Goods::destroy($id);
       if($res){
        echo json_encode(['erron'=>200,'msg'=>'成功']);
       }
    }
}
