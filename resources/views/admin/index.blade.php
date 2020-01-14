<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>品牌展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<a href="{{url('brand/create')}}">品牌添加</a>
<form>
	<input type="text" name="brand_name" value="{{$quest['brand_name']??''}}"><button>搜索</button>
</form>
<table class="table table-condensed">
	<caption>列表展示</caption>

	<thead>
		<tr>
            <th>id</th>
			<th>名称</th>
			<th>网址</th>
			<th>介绍</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($data as $v)
		<tr>
			<td><img src="{{env('APP_UPLOADS')}}{{$v->brand_logo}}" width="80">{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
            <td>{{$v->brand_desc}}</td>
            <td>
                <a href="{{url('brand/edit/'.$v->brand_id)}}"  class="btn btn-info">编辑</a>
                <a href="{{url('brand/del/'.$v->brand_id)}}"  class="btn btn-warning">删除</a>
            </td>
		</tr>
    @endforeach 
    <tr>
        <td>{{$data->appends($quest)->links()}}</td>
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
			success:function(res){
				$('tbody').html(res);
			}

		})
		return false;
	})
</script>