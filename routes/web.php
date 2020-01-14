<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//闭包路由
Route::get('/', function () {
    return view('welcome');
});
//闭包路由
Route::get('hello',function(){
    return 'Hello,welcome to LaraveLacademy.org';
});
Route::get('wa',function(){
    return '你好北京';
});
//控制器路由
Route::get('/user', 'IndexController@index');
//视图路由
Route::view('aa','beijing',['name'=>"贺晓盟"]);
Route::get('login','IndexController@login');
Route::post('dologin','IndexController@dologin');
//支持多种路由的写法
Route::match(['get','post'],'/login','IndexController@login');
Route::any('/login','IndexController@login');
Route::get('list','StudentController@lists');
// Route::match(['get','post'],'/create','StudentController@lists');
//闭包路由
// Route::get('user/{id}',function($id){
//     return 'User'.$id;
// });
Route::get('user/{id}/{name?}','StudentController@lists')->where('id','[0-9]+','name','[a-z]+');
Route::prefix('brand')->group(function(){
    Route::get('create','BrandController@create');
    Route::post('store','BrandController@store');
    Route::get('index','BrandController@index');
    Route::get('edit/{id}','BrandController@edit');
    Route::post('update/{id}','BrandController@update');
    Route::get('del/{id}','BrandController@destroy');
});
Route::prefix('book')->group(function(){
    Route::get('create','BookController@create');
    Route::post('store','BookController@store');
    Route::get('index','BookController@index');
    Route::get('edit/{id}','BookController@edit');
    Route::post('update/{id}','BookController@update');
    Route::get('del/{id}','BookController@destroy');
});
Route::prefix('students')->group(function(){
    Route::get('create','StudentsController@create');
    Route::post('store','StudentsController@store');
    Route::get('index','StudentsController@index');
    Route::get('edit/{id}','StudentsController@edit');
    Route::post('update/{id}','StudentsController@update');
    Route::get('destroy/{id}','StudentsController@destroy');
});
Route::prefix('staff')->group(function(){
    Route::get('create','StaffController@create');
    Route::post('store','StaffController@store');
    Route::get('index','StaffController@index');
    Route::get('del/{id}','StaffController@destroy');
});
Route::prefix('cart')->group(function(){
    Route::get('create','CartController@create');
    Route::post('store','CartController@store');
    Route::get('index','CartController@index');
    Route::get('edit/{id}','CartController@edit');
    Route::get('del/{id}','CartController@destroy');
    Route::post('update/{id}','CartController@update');

});
Route::prefix('books')->group(function(){
    Route::get('create','BooksController@create');
    Route::post('store','BooksController@store');
});
Route::prefix('goods')->group(function(){
    Route::get('create','GoodsController@create');
    Route::post('store','GoodsController@store');
    Route::get('index','GoodsController@index');
    Route::get('edit/{id}','GoodsController@edit');
    Route::get('del/{id}','GoodsController@destroy');
    Route::post('update/{id}','GoodsController@update');
    Route::get('nameony','GoodsController@nameony');
    Route::get('show/{id}','GoodsController@show');
    Route::post('addCart','GoodsController@addCart');
    Route::get('cart','GoodsController@cart');
});
Route::prefix('new')->middleware('checklogin')->group(function(){
    Route::get('create','NewController@create');
    Route::post('store','NewController@store');
    Route::get('index','NewController@index');
    Route::get('edit/{id}','NewController@edit');
    Route::get('del/{id}','NewController@destroy');
    Route::post('update/{id}','NewController@update');

});
Route::prefix('login')->group(function(){
    Route::get('/create','LoginController@create');
    Route::post('store','LoginController@store');
    Route::get('index','LoginController@index');
    Route::get('edit/{id}','LoginController@edit');
    Route::get('del/{id}','LoginController@destroy');
    Route::post('update/{id}','LoginController@update');
});
Route::prefix('url')->group(function(){
    Route::get('/create','UrlController@create');
    Route::post('store','UrlController@store');
    Route::get('index','UrlController@index');
    Route::get('edit/{id}','UrlController@edit');
    Route::get('del/{id}','UrlController@destroy');
    Route::post('update/{id}','UrlController@update');
});
Route::prefix('article')->middleware('checklogin')->group(function(){
    Route::get('/create','ArticleController@create');
    Route::post('store','ArticleController@store');
    Route::get('index','ArticleController@index');
    Route::get('edit/{id}','ArticleController@edit');
    Route::get('del/{id}','ArticleController@destroy');
    // Route::post('del/{id}','ArticleController@destroy');
    Route::post('update/{id}','ArticleController@update');
});
Route::prefix('good')->group(function(){
    Route::get('/create','GoodController@create');
    Route::post('store','GoodController@store');
    Route::get('index','GoodController@index');
    Route::get('edit/{id}','GoodController@edit');
    Route::get('del/{id}','GoodController@destroy');
    // Route::post('del/{id}','ArticleController@destroy');
    Route::post('update/{id}','GoodController@update');
});
Route::prefix('house')->group(function(){
    Route::get('/create','SellhouseController@create');
    Route::post('store','SellhouseController@store');
    Route::get('index','SellhouseController@index');
    Route::get('edit/{id}','SellhouseController@edit');
    Route::get('del/{id}','SellhouseController@destroy');
    // Route::post('del/{id}','ArticleController@destroy');
    Route::get('product/{id}','SellhouseController@product');
});
Route::get('/test1',function(){
    return response('hello')->cookie('name','张三',1);
});
Route::get('/tes',function(){
    // Illuminate\Support\Facades\Cookie::queue('name','任鹏举',1);
    return Cookie::get('name');
});
Route::get('send','GoodsController@sendemail');
//后台库存管理员登陆
Route::get('login','UserController@login');
Route::post('store','UserController@store');
Route::get('show','UserController@show');
//评论登陆
Route::get('login','CommentLoginController@login');
Route::post('store','CommentLoginController@store');
//评论路由
Route::prefix('comment')->middleware('commentlogin')->group(function(){
    Route::get('create','CommentController@create');
    Route::post('store','CommentController@store');
    Route::get('index','CommentController@index');
    Route::get('edit/{id}','CommentController@edit');
    Route::get('del/{id}','CommentController@destroy');
    // Route::post('del/{id}','ArticleController@destroy');
    Route::post('update/{id}','CommentControllers@update');
});
