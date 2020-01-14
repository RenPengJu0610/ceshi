<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Validator;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand_name     =   request()->brand_name??'';
        $where  =   [];
        if(!empty($brand_name)){
            $where[]=['brand_name','like','%'.$brand_name.'%'];
        }
        // DB::connection()->enableQueryLog();
        $data   =   Brand::where($where)->orderBy('brand_id','desc')->paginate(3);
        $quest  =   request()->all();
        $logs = DB::getQueryLog();
        // dump($logs);
        if(request()->ajax()){
            return view('admin/Ajaxindex',['data'=>$data,'quest'=>$quest]);
        }
        return view('admin/index',['data'=>$data,'quest'=>$quest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreBrandPost $request)
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'brand_name' => 'required|unique:posts|max:255',
        //     'brand_name' => 'unique:brand',
        // ],[
        //     'brand_name.required'=>'品牌名称必填！',
        //     'brand_name.unique'=>'品牌名称已存在'
        // ]);
        $post   =   $request->except('_token');
        $validator = Validator::make($post, [
            'brand_name' => 'required|unique:brand|max:255',
            // 'body' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填！',
            'brand_name.unique'=>'品牌名称已存在'
        ]);
            if ($validator->fails()){
            return redirect('brand/create')
                    ->withErrors($validator)
                    ->withInput();
        }
        if($request->hasFile('brand_logo')){
            $post['brand_logo'] =   $this->upload('brand_logo');
        }
        $data   =   Brand::create($post);
        if($data){
            return  redirect('brand/index');
        }else{
            return  redirect('store');
        }
    }
    public function upload($filename){
        if (request()->file($filename)->isValid())
        { $photo = request()->file($filename);
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
        $data   =   brand::find($id);
        // dd($data);
       return view('admin/edit',['data'=>$data]);
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
        $post  =   $request->except('_token');
        if($request->hasFile('brand_logo')){
            $post['brand_logo'] =   $this->upload('brand_logo');
        }
        $res   =   Brand::where('brand_id',$id)->update($post);
        
        if($res !== false){
            return  redirect('brand/index');
        }else{
            return  redirect('edit');
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
        $res   =   Brand::destroy($id);
        if($res !== false){
            return  redirect('brand/index');
        }else{
            return  redirect('edit');
        }
    }
}
