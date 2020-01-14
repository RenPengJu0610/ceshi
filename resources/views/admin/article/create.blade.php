<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书添加</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
    <script src="/static/admin/jquery.min.js"></script>
</head>
<body>
<h3>图书添加</h3><hr/>
<form class="form-horizontal" role="form" action="{{url('article/store')}}" method="post" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="article_name" id="firstname" 
				   placeholder="">
                   <span style="color:red">{{$errors->first('article_name')}}</span>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-10" >
			<select name="article_type" id="#types">
                <option value="">请选择</option>
                <option value="古诗词">古诗词</option>
                <option value="散文">散文</option>
            </select>
            <span style="color:red">{{$errors->first('article_type')}}</span>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-10">
			<input type="radio" value="1" name="article_cance" checked>普通
            <input type="radio" value="2" name="article_cance">置顶
		</div>
        <span style="color:red">{{$errors->first('article_cance')}}</span>
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
			<input type="text" class="form-control" name="article_author" id="firstname" 
				   placeholder="">
                   <h6 style="color:red">{{$errors->first('article_author')}}</h6>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者email</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="article_email" id="firstname" 
				   placeholder="">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="article_keyword" id="firstname" 
				   placeholder="">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-10">
			<textarea name="article_tex" id="" cols="30" rows="10"></textarea>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" name="article_img" id="firstname" 
				   placeholder="">
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
<script>
	$('#firstname').blur(function(){
		 var create_name = $(this).val();
		 if(create_name == ''){
			 $(this).next('span').text('文章标题必填！')
		 }
		
	})`
	$('#firstname').focus(function(){
		$(this).next('span').text('')
	})
</script>
