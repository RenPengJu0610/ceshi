<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>新闻展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<a href="{{url('new/create')}}">新闻添加</a>
<h3>{{session('userinfo')->login_name}} <a href="{{url('login/index')}}">退出</a> </h3>
<form action="">
    新闻名称<input type="text" name="new_name" value="{{$query['new_name']??''}}">
    <button>搜索</button>
</form>
<table class="table table-condensed">
	<caption>列表展示</caption>

	<thead>
		<tr>
            <th>id</th>
			<th>名称</th>
			<th>作者</th>
			<th>新闻详情</th>
            <th>商品分类</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($data as $v)
		<tr>
			<td>{{$v->new_id}}</td>
			<td>{{$v->new_name}}</td>
			<td>{{$v->new_author}}</td>
            <td>{{$v->new_desc}}</td>
            <td>{{$v->cart_name}}</td>
            <td>
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
    var url = $(this).attr('href');
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
