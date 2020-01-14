<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Url;
class Urlcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   =   Url::paginate(2);
        return view('admin/url/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/url/create');
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
            'url_name' => 'required|unique:url|max:255|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'url_http' => 'required|regex:[^http]',
        ],[
            'url_name.required'=>'网站名称必填',
            'url_name.unique'=>'网站名称已存在',
            'url_name.regex'=>'网站名称必须是由中文字母数字下划线组成',
            'url_http.required' => '网站网址必填',
            'url_http.regex' => '网站网址必需以http开始'
        ]);
        $post   =   $request->except('_token');
        if($request->hasFile('url_img')){
            $post['url_img']    =   $this->upload('url_img');
        }
        $res    =   Url::insert($post);
        if($res){
            return redirect('url/index');
        }

    }
    public function upload($filename){
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
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
        dd($id);
    }
}
