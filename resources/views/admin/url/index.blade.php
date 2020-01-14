<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>网址展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<a href="{{url('url/create')}}">网址添加</a>
<table class="table table-condensed">
	<caption>列表展示</caption>

	<thead>
		<tr>
            <th>id</th>
			<th>网站名称</th>
			<th>网址</th>
			<th>网站图片</th>
            <th>网站分类</th>
            <th>是否显示</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($data as $v)
		<tr>
			<td>{{$v->url_id}}</td>
			<td>{{$v->url_name}}</td>
            <td>{{$v->url_http}}</td>
			<td><img src="{{env('APP_UPLOADS')}}{{$v->url_img}}" width="80"></td>
            <td>{{$v->url_type == 1 ? '图片链接':'文字链接'}}</td>
            <td>{{$v->url_show == 1 ? '显示' : '不显示'}}</td>
            <td>
                <a href="{{url('url/del/'.$v->url_id)}}" class="btn btn-info">编辑</a>
                <a onclick="Delurl({{$v->url_id}},$(this))" class="btn btn-warning">删除</a>
            </td>
		</tr>
        @endforeach
    <tr>
        <td>{{$data->links()}}</td>
    </tr>
	</tbody>
</table>
</body>
</html>
<script>
    function Delurl(url_id,ele){
        $.ajax({
            url:"{{url('url/del')}}",
            data:{url_id:url_id},
            type:'get',
            dataType:'json',
            success:function(json_info){
                alert(11);
            }
        })
    }
</script>
