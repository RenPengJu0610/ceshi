<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article_name   =   request()->article_name;
        $article_type   =   request()->article_type;
        $where  =   [];

        if(!empty($article_name)){
            $where[]    =   ['article_name','like','%'.$article_name.'%'];
        }
        if(!empty($article_type)){
            $where[]    =   ['article_type','like','%'.$article_type.'%'];
        }
        $query  =   request()->all();
        $data   =   Article::where($where)->paginate(3);
        return view('admin/article/index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/article/create');
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
            'article_name' => 'required|unique:article|max:255|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'article_cance' => 'required',
            'article_type' => 'required',
            'article_show' => 'required'
        ],[
            'article_name.required'=>'文章名称必填',
            'article_cance.required'=>'文章重要性不能为空',
            'article_type.required'=>'文章分类不能为空',
            'article_show.required'=>'是否显示不能为空',
            'article_name.unique'=>'文章名称已存在',
            'article_name.regex'=>'文章名称必须是由中文字母数字下划线组成'
        ]);
        $post   =   $request->except('_token');
        if($request->hasFile('article_img')){
            $post['article_img']    =   $this->upload('article_img');
        }
        $res    =   Article::insert($post);
        if($res){
            return redirect('article/index');
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
        $data   =   Article::where('article_id',$id)->first();
        return view('admin/article/edit',['data'=>$data]);
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
        if($request->hasFile('article_img')){
            $post['article_img'] =   $this->upload('article_img');
        }
        $res    =   Article::where('article_id',$id)->update($post);
        if($res !== false){
            return redirect('article/index');
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
        // echo $id;die;
        $res    =   Article::destroy($id);
        if($res){
            if(request()->ajax()){
                echo json_encode(['erron'=>200,'msg'=>'删除成功']);die;
            }else{
                 return redirect('article/index');
            }
           
        }
    }
}
