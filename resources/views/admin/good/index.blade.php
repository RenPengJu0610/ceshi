<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>商品展示</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<a href="{{url('good/create')}}">商品添加</a>
<table class="table table-condensed">
	<caption>列表展示</caption>

	<thead>
		<tr>
            <th>id</th>
			<th>名称</th>
			<th>价格</th>
			<th>商品LOGO</th>
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
            <td><img src="{{env('APP_UPLOADS')}}{{$v->goods_img}}" width="80"></td>
            <td>{{$v->goods_desc}}</td>
            <td>
                <a href="{{url('goods/edit/'.$v->goods_id)}}"  class="btn btn-info">编辑</a>
                <a onclick="del({{$v->goods_id}})" href="javascript:void(0)"  class="btn btn-warning">删除</a>
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
function del(id){
    $.get('/good/del/'+id,function(json){
        if(json.erron == 200){
            alert(json.msg);
            location.reload();
        }
    },'json')
}
$(document).on('click','.pagination a',function(){
    var url     =   $(this).attr('href');
    $.ajax({
        url:url,
        type:'get',
        dataType:'text',
        success:function(te){
            $('tbody').html(te);
        }
    })
    return false;
})
</script>
