<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>登陆</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
</head>
<body>
<h3>用户登录</h3><hr/>
{{session('msg')}}
<form class="form-horizontal" role="form" action="{{url('login/store')}}" method="post" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="login_name" id="firstname" 
				   placeholder="">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="password" name="login_pwd" class="form-control" id="firstname" 
				   placeholder="">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登陆</button>
		</div>
	</div>
</form>
</body>
</html>
</body>
</html>