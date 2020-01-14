<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8"> 
	<title>网址展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<h3>{{session('userinfo')->login_name}} <a href="{{url('login/index')}}">退出</a> </h3>
<a href="{{url('article/create')}}">网址添加</a>
<form action="">
    <input type="text" name="article_name" value="{{$query['article_name']??''}}">文章标题
    <select name="article_type">
        <option value="">--请输入--</option>
        <option value="古诗词">古诗词</option>
        <option value="散文">散文</option>
    </select>
    <button>搜索</button>
</form>
<table class="table table-condensed">
	<caption>列表展示</caption>

	<thead>
		<tr>
            <th>id</th>
			<th>文章名称</th>
			<th>文章分类</th>
			<th>文章重要性</th>
            <th>是否显示</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($data as $v)
		<tr>
			<td>{{$v->article_id}}</td>
			<td>{{$v->article_name}}</td>
            <td>{{$v->article_type}}</td>
			<td>{{$v->article_cance ==1 ? '普通':'置顶'}}</td>
            <td>{{$v->article_show == 1 ? '显示' : '不显示'}}</td>
            <td>
                <a href="{{url('article/edit/'.$v->article_id)}}" class="btn btn-info">编辑</a>
                <a onclick="Del({{$v->article_id}})" href="javascript:void(0)" class="btn btn-warning">删除</a>
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

    function Del(article_id){
    //     $.ajaxSetup({
    //     headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    //     $.ajax({
    //         url:'/article/del/'+article_id,
    //         data:'',
    //         type:'post',
    //         dataType:'json',
    //         success:function(json_info){
    //             if(json_info.erron == 200){
    //                 alert(json_info.msg);
    //                 location.reload();
    //             }
    //         }
    //     })
    $.get('/article/del/'+article_id,function(json_info){
        if(json_info.erron == 200){
                    alert(json_info.msg);
                    location.reload();
                }
    },'json')
    }
      
</script>
