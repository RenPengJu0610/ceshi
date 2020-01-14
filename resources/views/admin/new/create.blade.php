<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻添加</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
</head>
<body>
<h3>新闻添加</h3><hr/>
<form class="form-horizontal" role="form" action="{{url('new/store')}}" method="post" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="new_name" id="firstname" 
				   placeholder="请输入商品名称"><b>{{$errors->first('new_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻分类</label>
		<div class="col-sm-10">
			<select name="cart_id">
                <option value="">--请选择--</option>
                @foreach($data as $v)
                <option value="{{$v->cart_id}}">{{$v->cart_name}}</option>
                @endforeach
            </select>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻作者</label>
		<div class="col-sm-10">
			<input type="text" name="new_author" class="form-control" id="firstname" 
				   placeholder="请输入名字"><b>{{$errors->first('new_author')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">新闻详情</label>
		<div class="col-sm-10">
			<input type="textarea" name="new_desc"  class="form-control" id="lastname" 
				   placeholder="请输入商品介绍"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">新闻添加</button>
		</div>
	</div>
</form>

</body>
</html>
</body>
</html>