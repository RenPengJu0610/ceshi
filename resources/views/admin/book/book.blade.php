<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 悬停表格</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
</head>
<body>

<table class="table table-hover">
    <h3>列表展示</h3><hr>
    <h3><a href="{{url('book/create')}}">图书添加</a></h3>
	<thead>
		<tr>
            <th>id</th>
			<th>图书名称</th>
			<th>价格</th>
			<th>介绍</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($data as $v)
		<tr>
			<td>{{$v->book_id}}</td>
			<td>{{$v->book_name}}</td>
			<td>{{$v->book_price}}</td>
            <td>{{$v->book_desc}}</td>
            <td>
                <a href="{{url('book/edit/'.$v->book_id)}}" class="btn btn-warning">编辑</a>||
                <a href="{{url('book/del/'.$v->book_id)}}" class="btn btn-danger">删除</a>
            </td>
		</tr>
	@endforeach
        <tr>
            <td colspan = "5">{{$data->links()}}</td>
        </tr>
	</tbody>
</table>

</body>
</html>