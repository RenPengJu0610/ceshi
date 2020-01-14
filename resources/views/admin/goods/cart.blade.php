<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
	<title>购物车列表</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<table class="table table-condensed">
	<caption></caption>

	<thead>
		<tr>
            <th>商品id</th>
            <th>商品名称</th>
            <th>商品单价</th>
            <th>购买数量</th>
            <th>添加时间</th>
            <th>总价</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $v)
		<tr>
           <td>{{$v['goods_id']}}</td>
           <td>{{$v['goods_name']}}</td>
           <td>{{$v['goods_price']}}</td>
           <td>{{$v['buy_number']}}</td>
           <td>{{date("Y-m-d H:i:s",$v['utime'])}}</td>
           <td>{{$v['goods_price']*$v['buy_number']}}</td>
		</tr>
    @endforeach
	</tbody>
   
</table>
</body>
</html>