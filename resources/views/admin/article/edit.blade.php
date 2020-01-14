<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书修改</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
    <script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<h3>图书修改</h3><hr/>
<form class="form-horizontal" role="form" action="{{url('article/update/'.$data->article_id)}}" method="post" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="article_name" id="firstname" 
				   placeholder="" value="{{$data->article_name}}">
                   <h6 style="color:red">{{$errors->first('article_name')}}</h6>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-10">
			<input type="radio" value="1" checked name="article_cance">普通
            <input type="radio" value="2" name="article_cance">置顶
		</div>
        <h6 style="color:red">{{$errors->first('article_cance')}}</h6>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio" value="1" name="article_show" checked>显示
            <input type="radio" value="2" name="article_show">不显示
		</div>
        <h6 style="color:red">{{$errors->first('article_show')}}</h6>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$data->article_author}}" name="article_author" id="firstname" 
				   placeholder="">
                   <h6 style="color:red">{{$errors->first('article_author')}}</h6>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者email</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$data->article_email}}" name="article_email" id="firstname" 
				   placeholder="">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$data->article_keyword}}" name="article_keyword" id="firstname" 
				   placeholder="">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-10">
			<textarea name="article_tex" id="" cols="30" rows="10">{{$data->article_tex}}</textarea>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		<div class="col-sm-10">
        <img src="{{env('APP_UPLOADS')}}{{$data->article_img}}" width="80">
			<input type="file" class="form-control" name="article_img" id="firstname" 
				   placeholder="">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>
</body>
</html>
