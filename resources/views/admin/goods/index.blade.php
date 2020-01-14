<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>商品展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<a href="{{url('goods/create')}}">商品添加</a>
<form>
	<input type="text" name="goods_name" value="{{$query['goods_name']??''}}"><button>搜索</button>
</form>
<table class="table table-condensed">
	<caption>列表展示</caption>

	<thead>
		<tr>
            <th>id</th>
			<th>名称</th>
			<th>价格</th>
            <th>品牌</th>
            <th>分类</th>
			<th>商品LOGO</th>
            <th>商品相册</th>
            <th>商品介绍</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($data as $v)
		<tr>
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->goods_price}}</td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->cart_name}}</td>
            <td><img src="{{env('APP_UPLOADS')}}{{$v->goods_img}}" width="80"></td>
            <td>
                @if($v->goods_imgs)
                @foreach($v->goods_imgs as $vv)
                    <img src="{{env('APP_UPLOADS')}}{{$vv}}" width="80">
                
                @endforeach
                @else <span style="color:red">没有图片可展示</span>
                @endif
            </td>
            <td>{{$v->goods_desc}}</td>
            <td>
                <a href="{{url('goods/show/'.$v->goods_id)}}"  class="btn btn-info">详情</a>
                <a href="{{url('goods/edit/'.$v->goods_id)}}"  class="btn btn-info">编辑</a>
                <a href="{{url('goods/del/'.$v->goods_id)}}"  class="btn btn-warning">删除</a>
            </td>
		</tr>
        @endforeach
    <tr>
        <td>{{$data->appends($query)->links()}}</td>
    </tr>
	</tbody>
</table>
</body>
</html>
<script>
    $(document).on('click','.pagination a',function(){
        var url =   $(this).attr('href');
        $.ajax({
            url:url,
            type:'get',
            dataType:'text',
            success:function(json_info){
                $('tbody').html(json_info);
            }
        })
        return false;
    })
</script>
