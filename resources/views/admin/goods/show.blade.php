<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>详情展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<span style="color:red">当前访问量：{{$query}}</span>
<table class="table table-condensed">
	<caption>{{$data->goods_name}}</caption>

	<thead>
		<tr>
            <th>商品相册</th>
            <th>商品介绍</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
            <td>
                @if($data->goods_imgs)
                    @foreach($data->goods_imgs as $v)
                    <img src="{{env('APP_UPLOADS')}}{{$v}}" width="80">
                    @endforeach
                @else <span style="color:red">没有图片可展示</span>
                @endif
            </td>
            <td>{{$data->goods_desc}}</td>
            <td> <button>购买</button></td>
		</tr>
	</tbody>
   
</table>
</body>
<script>
    $('button').click(function(){
        var goods_id    =   {{$data->goods_id}};
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.post('/goods/addCart',{goods_id:goods_id},function(res){
            if(res.code == 00001){
                alert(res.msg);
                location.href='/login/create';
            }
           if(res.code=='00000'){
               alert(res.msg);
                location.href='/goods/cart';
           }
        },'json')
    })
</script>
</html>