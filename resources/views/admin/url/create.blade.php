<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>网站链接添加</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
    <script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<h3>网站链接添加</h3><hr/>
<form class="form-horizontal" role="form" action="{{url('url/store')}}" method="post" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网站名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="url_name" id="firstname" 
				   placeholder="">
                   <h6 style="color:red">{{$errors->first('url_name')}}</h6>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">网站网址</label>
		<div class="col-sm-10">
			<input type="text" name="url_http"  class="form-control" id="lastname" 
				   placeholder="">
                   <h6 style="color:red">{{$errors->first('url_http')}}</h6>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网址图片</label>
		<div class="col-sm-10">
			<input type="file" name="url_img" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网址类型</label>
		<div class="col-sm-10">
			<input type="radio" name="url_type" value="1" checked>LOGO链接
            <input type="radio" name="url_type" value="2">文字链接
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio" name="url_show" value="1">显示
            <input type="radio" name="url_show" value="2" checked>不显示
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>
</body>
</html>
