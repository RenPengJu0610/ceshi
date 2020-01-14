<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>留言展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<a href="{{url('comment/create')}}">留言发布</a>
<form>
	姓名：<input type="text" name="admin_name" value="{{$query['admin_name']??''}}"><button>搜索</button>
</form>
<table class="table table-condensed">
	<caption><h1>评论展示</h1></caption>
    <span style="color:red"><h3>{{session('msg')}}</h3></span>
    <h3>阅读次数：{{$number}} 次</h3>
	<thead>
		<tr>
            <th>编号</th>
			<th>留言内容</th>
			<th>姓名</th>
            <th>时间</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($data as $v)
		<tr>
			<td>{{$v->comment_id}}</td>
			<td>{{$v->comment}}</td>
			<td>{{$v->admin_name}}</td>
            <td>{{date('Y-m-d H:i:s',$v->utime)}}</td>
            <td>
                @if($v->codel ==1)
                <a href="{{url('comment/del/'.$v->comment_id)}}"  class="btn btn-warning">删除</a>
                @else
                <a href="#"  class="btn btn-warning">不能删除</a>
                @endif
            </td>
		</tr>
        @endforeach
	</tbody>
</table>
</body>
</html>

