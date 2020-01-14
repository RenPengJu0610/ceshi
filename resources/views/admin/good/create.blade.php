<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品添加</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
</head>
<body>
<h3>商品添加</h3><hr/>
<form class="form-horizontal" role="form" action="{{url('good/store')}}" method="post" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="goods_name" id="firstname" 
				   placeholder="请输入商品名称">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌价格</label>
		<div class="col-sm-10">
			<input type="text" name="goods_price" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品LOGO</label>
		<div class="col-sm-10">
			<input type="file" name="goods_img" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品描述</label>
		<div class="col-sm-10">
			<input type="textarea" name="goods_desc"  class="form-control" id="lastname" 
				   placeholder="请输入商品介绍"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">商品添加</button>
		</div>
	</div>
</form>

</body>
</html>
</body>
</html>