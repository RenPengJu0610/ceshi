<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Brand;
use App\Cart;
use App\Carts;
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    public function sendemail()
    {
        Mail::to('2530690523@qq.com')->send(new SendCode());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods_name     =   request()->goods_name??"";
        $page   =   request()->page?:1;
        // $data   =   Cache::get('key_'.$page.'_'.$goods_name);
        //Redis::flushAll();
        $data   =   Redis::get('key_'.$page.'_'.$goods_name);
        // dump($data);
        $query  =   request()->all();
        // dump($data);
        if(!$data){
        echo '没有缓存';
        $where  =   [];
        if(!empty($goods_name)){
            $where[]    =   ['goods_name','like','%'.$goods_name.'%'];
        }
        
        $data   =   Goods::select('goods.*','brand.brand_name','cart.cart_name')
                            ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
                            ->leftjoin('cart','goods.cart_id','=','cart.cart_id')
                            ->where($where)
                            ->paginate(3);
        foreach($data as $v){
            if($v->goods_imgs){
                 $v->goods_imgs  =   explode('|',$v->goods_imgs);
            }
        }
       // dd($data);
        // Cache::put('key_'.$page.'_'.$goods_name, $data, 100);
        $data   =   serialize($data);
       // dd($data);
            Redis::setex('key_'.$page.'_'.$goods_name,10,$data);
        
    }
   // dd($data);
         $data   =   unserialize($data);
        // dd($data);
        if(request()->ajax()){
            return view('admin/goods/Ajaxindex',['data'=>$data,'query'=>$query]);
        }else{
            return view('admin/goods/index',['data'=>$data,'query'=>$query]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //品牌查询
        $brand  =   Brand::get();
        $cart   =   Cart::get();
        $cart_list= contentform($cart);
        return view('admin/goods/create',['brand'=>$brand,'cart_list'=>$cart_list]);
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
            $post['goods_img']  =   upload('goods_img');
        }
        if(isset($post['goods_imgs'])){
            $post['goods_imgs'] =  moreuploads('goods_imgs');
            $post['goods_imgs'] =   implode('|',$post['goods_imgs']);
        }
        $post['utime']  =   time();
        $post['ctime']  =   time();
        $res    =   Goods::insert($post);
        if($res){
            return redirect('goods/index');
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
        $redis  =   Redis::setnx('show_'.$id,1);
        // dd($redis);
        $query  =   Redis::get('show_'.$id);
        // dd($query);
        if(!$redis){
            $query =    Redis::incr('show_'.$id);
        }
        $data   =   goods::find($id);
            if($data->goods_imgs){
                 $data->goods_imgs  =   explode('|',$data->goods_imgs);
            }
        
        return view('admin/goods/show',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data   =   Goods::where('goods_id',$id)->first();
        return view('admin/goods/edit',['data'=>$data]);
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
       $post    =   $request->except('_token');
       $res     =   Goods::where('goods_id',$id)->update($post);
       if($res !== false){
           return redirect('goods/index');
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
        $res     =   Goods::destroy($id);
        if($res){
            return redirect('goods/index');
        }
    }
    //唯一性验证
    public function nameony(){
        $goods_name     =   request()->goods_name;
        $where  =   [];
        if($goods_name){
            $where['goods_name']=$goods_name;
        }
        $count  =   Goods::where($where)->count();
        echo $count;
    }
    public function userinfo(){
        $userinfo   =   session('userinfo');
        $user_id    =   $userinfo->login_id;
        return $user_id;
    }
    public function addCart(){
        $goods_id   =   request()->goods_id;
        $buy_number =   1;
        if(!session('userinfo')){
            return $this->addCookieCart($goods_id,$buy_number);
       }else{
           $user_id     =   $this->userinfo();
       return $this->AddCartMysql($goods_id,$buy_number,$user_id); 
       }
    //    dd($data);
    }
    
    public function addCookieCart($goods_id,$buy_number){
        $data       =   json_decode(Cookie::get('cart'),true)??[];
        // dd($data);
        if(array_key_exists('cart_'.$goods_id,$data)){
            $data['cart_'.$goods_id]['buy_number']  +=  $buy_number;
            return response()->json(['code' => '00000', 'msg' => '加入购物车成功'])->cookie('cart',json_encode($data),30);
        }
        // dd($data);
        $goods      =   Goods::where('goods_id',$goods_id)->first();
        $data['cart_'.$goods_id]       =   [
            'goods_id'   =>  $goods_id,
            'goods_name' =>  $goods->goods_name,
            'goods_price'=>  $goods->goods_price,
            'buy_number' =>  $buy_number,
            'utime'      =>  time()
        ];
        // dd($data);
        return response()->json(['code' => '00000', 'msg' => '加入购物车成功'])->cookie('cart',json_encode($data),30);
    }
    public function AddCartMysql($goods_id,$buy_number,$user_id){
        
        $goods  =   Goods::where('goods_id',$goods_id)->first();
        // dd($goods);
        $add_goods  =   Carts::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->first();
        
       //dd($add_goods);
       if($add_goods){
            if($add_goods->buy_number+$buy_number>$goods->goods_number){
                echo json_encode(['code'=>'00002','msg'=>'库存不足，换一个试试']);die;
            }
           $res= Carts::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->increment('buy_number',$buy_number);
           if($res){
            echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;
           }
        }
        if($goods->goods_number<$buy_number){
            // echo 123;die;
            echo json_encode(['code'=>'00002','msg'=>'库存不足，换一个试试']);die;
        }
       $data    =   [
           'user_id'    =>  $user_id,
           'goods_id'   =>  $goods_id,
           'goods_price'=>  $goods->goods_price,
           'goods_name' =>  $goods->goods_name,
           'buy_number' =>  $buy_number,
           'utime'      =>  time()
       ];
       $res     =   Carts::insert($data);
       if($res){
           echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;
       }
    
    }
    public function cart(){
        if(!session('userinfo')){
           $res =   json_decode(Cookie::get('cart'),true)??[];
            // dd($res);
        }else{
            $user_id    =   $this->userinfo();
            $res        =   Carts::where('user_id',$user_id)->get()->toArray();
            // dd($res);
        }
        
        return view('admin/goods/cart',['res'=>$res]);
    }
}
