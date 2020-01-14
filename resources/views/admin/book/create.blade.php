<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
</head>
<body>
<h3>图书添加</h3><hr>
<form class="form-horizontal" role="form" action="{{url('book/store')}}" method="post">
	@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="book_name" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">价格</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="book_price" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
    
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">描述</label>
		<div class="col-sm-10">
			<input type="textarea" class="form-control" name="book_desc" id="lastname" 
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