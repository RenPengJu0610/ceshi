<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Cache;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_name     =   request()->admin_name;
        $query  =   request()->all();
        //项目优化 Memcache 缓存
        $data   =   Cache::get('key_'.$admin_name);
        Cache::increment('number',1);
        $number     =   Cache::get('number');
        //判断MEMCACHE 里是否有缓存的存在，没有则从数据库添加
        if(!$data){
            echo '没缓存';
            $where      =   [];
            $where[]    =   ['status','=',1];
            if($admin_name){
                $where[]    =   ['admin_name','like','%'.$admin_name.'%'];
            }
            $data   =   Comment::select('comment.*','admins.admin_name')
                        ->leftjoin('admins','comment.admin_id','=','admins.admin_id')
                        ->where($where)
                        ->orderBy('utime','desc')
                        ->get();
                        foreach($data as $k=>$v){
                            if($v->admin_id == session('userinfo')->admin_id){
                                $data[$k]['codel']  =   1;
                            }else{
                                $data[$k]['codel']  =   0;
                            }
                        }
                        // dd($data);
            //没缓存从数据库存入到memcache里
            Cache::put('key_'.$admin_name,$data,30);    
        }
        return view('admin/comment/index',['data'=>$data,'query'=>$query,'number'=>$number]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/comment/create');
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
        // $userinfo=  session('userinfo');
        // dd($userinfo->admin_id);
        $data   =   [
            'admin_id'  => session('userinfo')->admin_id,
            'comment'   =>  $post['comment'],
            'utime'     =>  time(),
            'status'    =>  1
        ];
        $res    =   Comment::insert($data);
        if($res){
            return redirect('comment/index');
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
        $where  =   [];
        $where['comment_id']  =$id;   
        $data   =   Comment::where($where)->first();
        if($data->admin_id == session('userinfo')->admin_id && (time()-$data->utime)<=600){
            $data->status   =   2;
            if($data->save()){
                return redirect('comment/index');
            }
        }else{
            return redirect('comment/index')->with('msg','不能删除超过十分钟的评论');
        }
    }
}
