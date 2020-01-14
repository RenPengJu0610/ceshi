<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>商品展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<a href="{{url('house/create')}}">商品添加</a>
<form>
	<input type="text" name="goods_name" value="{{$query['goods_name']??''}}"><button>搜索</button>
</form>
<table class="table table-condensed">
	<caption>列表展示</caption>

	<thead>
		<tr>
            <th>id</th>
			<th>小区名称</th>
			<th>联系人</th>
			<th>楼盘主图</th>
            <th>楼盘介绍</th>
            <th>操作</th>
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
                <a href="{{url('house/product/'.$v->house_id)}}"  class="btn btn-info">楼盘详情</a>
                <a onclick="del({{$v->house_id}})" href="javascript:void(0)"  class="btn btn-warning">删除</a>
            </td>
		</tr>
        @endforeach
	</tbody>
</table>
</body>
</html>
<script>
    function del(id){
        $.get('/house/del/'+id,function(res){
            if(res.erron == 200){
                alert(res.msg);
                location.reload();
            }
        },'json');
    }
</script>
