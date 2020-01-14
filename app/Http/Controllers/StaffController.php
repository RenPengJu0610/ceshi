<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staff;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff_name =   request()->staff_name;
        $where  =   [];
        if(!empty($staff_name)){
            $where[]    =   ['staff_name','like','%'.$staff_name.'%'];
        }
        $query  =   request()->all();
        $data   =   staff::where($where)->paginate(3);
        return view('admin/staff/index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/staff/create');
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
        if($request->hasFile('staff_img')){
            $post['staff_img']  =   $this->upload('staff_img');
        }
        $res    =   staff::insert($post);
        if($res){
            return redirect('staff/index');
        }
    }
    public function upload($filename)
    {
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
        $res   =   staff::destroy($id);
        if($res !== false){
            return  redirect('staff/index');
        }
    }
}
