<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/books/create');
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
            'books_name' => 'required|unique:books|max:255|alpha_num',
            'books_desc' => 'required'
        ],[
            'books_name.required'=>'书名必填',
            'books_name.unique'  =>'书名已存在',
            'books_desc.required'  =>'作者必填',
            'books_desc.alpha_num'  =>'作者必须是字母或数字。'

            ]);
        $post   =   $request->except('_token');
        if($request->hasFile('books_img')){
            $post['books_img']  =   $this->upload('books_img');
        }
        $res    =   Books::insert($post);
        dd($res);
        if($res){
            return redirect('books/index');
        }
    }
    public function upload($filename){
        if (request()->file($filename)->isValid()){
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
        
    }
}
