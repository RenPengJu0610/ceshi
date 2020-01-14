<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>商品展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<a href="{{url('house/create')}}">加入购物车</a>

<table class="table table-condensed">
	<caption>楼盘详情</caption>

	<thead>
		<tr>
            <th>id</th>
			<th>小区名称</th>
			<th>联系人</th>
			<th>楼盘主图</th>
            <th>楼盘介绍</th>
            <th>楼盘相册</th>
		</tr>
	</thead>
	<tbody>
        @foreach($data as $v)
		<tr>
			<td>{{$v->house_id}}</td>
			<td>{{$v->house_name}}</td>
			<td>{{$v->house_phone}}</td>
            <td><img src="{{env('APP_UPLOADS')}}{{$v->house_img}}" width="80"></td>
            <td>{{$v->house_desc}}</td>
            <td>
            @if($v->house_imgs)
                @foreach($v->house_imgs as $vv)
                    <img src="{{env('APP_UPLOADS')}}{{$vv}}" width="80">
                
                @endforeach
                @else <span style="color:red">没有图片可展示</span>
                @endif
            </td>
		</tr>
        @endforeach
	</tbody>
</table>
</body>
</html>
<script>
</script>
