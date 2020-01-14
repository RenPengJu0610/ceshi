<?php
function showMsg($status,$message = '',$data = array()){
    $result = array(
        'status'    =>  $status,
        'message'   =>  $message,
        'data'      =>  $data
    );
    exit(json_encode($result));
}
function contentform($data,$pid=0,$level=0){
    static $arr     =   [];
    $level  =   $level+1;
    foreach($data as $v){
        if($pid == $v->pid){
            $v['level'] =   $level;
            $arr[]      =   $v;
            contentform($data,$v->cart_id,$level);
        }
    }
    return $arr;
}
function upload($filename){
    if ( request()->file($filename)->isValid()) {
        $photo = request()->file($filename);
        // $extension = $photo->extension();
        $store_result = $photo->store('uploads');
        return $store_result;
    }
}
function moreuploads($filename){
    if(!$filename){
        return;
    }
    $img    =   request()->file($filename);
    $result =   [];
    foreach($img as $v){
        $result[]   =   $v->store('uploads');
    }
    return $result;
}