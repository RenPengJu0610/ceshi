<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>品牌添加</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
</head>
<body>
<h3>品牌添加</h3><hr/>
<!-- @if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif -->

<form class="form-horizontal" role="form" action="{{url('brand/store')}}" method="post"enctype="multipart/form-data">
	@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="brand_name" id="firstname" 
				   placeholder="请输入名字">
				   <b style="color:red">{{$errors->first('brand_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-10">
			<input type="text" name="brand_url" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-10">
			<input type="file" name="brand_logo" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-10">
			<input type="textarea" name="brand_desc"  class="form-control" id="lastname" 
				   placeholder="请输入姓"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="checkbox">
				<label>
					<input type="checkbox"> 请记住我
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">提交</button>
		</div>
	</div>
</form>

</body>
</html>