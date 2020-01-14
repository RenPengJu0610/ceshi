<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>售楼信息添加</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
	<script src="/static/admin/bootstrap.min.js"></script>
</head>
<body>
<h3>售楼信息添加</h3><hr/>
<form class="form-horizontal" role="form" action="{{url('house/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
			 基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">楼盘相册</a></li>
	<li><a href="#jmeter" data-toggle="tab">楼盘详情</a></li>
	
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>
		<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">小区名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="house_name" id="firstname" 
				   placeholder="请输入商品名称">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">地理位置</label>
		<div class="col-sm-10">
			<input type="text" name="house_ploce" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">面积</label>
		<div class="col-sm-10">
		<input type="text" name="house_area" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导购员</label>
		<div class="col-sm-10">
        <input type="text" name="house_guide" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">联系方式</label>
		<div class="col-sm-10">
        <input type="text" name="house_phone" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">楼盘主图</label>
		<div class="col-sm-10">
			<input type="file" name="house_img" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
		</p>
	</div>
	<div class="tab-pane fade" id="ios">
		<p>
		<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">楼盘相册</label>
		<div class="col-sm-10">
			<input type="file" name="house_imgs[]" multiple="multiple" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
		</p>
	</div>
	<div class="tab-pane fade" id="jmeter">
		<p>
		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">楼盘描述</label>
		<div class="col-sm-10">
			<input type="text" name="house_desc"  class="form-control" id="lastname" 
				   placeholder="请输入商品介绍">
		</div>
	</div>
		</p>
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
<!-- <script>

	$('input[name="goods_name"]').blur(function(){
		$(this).next().text('');
		var goods_name	= $(this).val();
		goodsname(goods_name);
		
	})
	function goodsname(goods_name){
		var flag 	=	true;
		var reg			=	/^[\u4e00-\u9fa5\w.\-]{1,16}$/;
		if(!reg.test(goods_name)){
			$('input[name="goods_name"]').next().text('商品名称必须由中文，字母，下划线组成');
			return false;
		}
		//唯一性验证
		// $.('/goods/nameony',{goods_name:goods_name},function(res){
		// 	if(res !=0){
		// 		$('input[name="goods_name"]').next().text('商品名称已存在');
		// 		return false;
		// 	}
		// },'json');
		$.ajax({
			url:'/goods/nameony',
			data:{goods_name:goods_name},
			type:'get',
			dataType:'json',
			async:false,
			success:function(res){
				if(res !=0){
				$('input[name="goods_name"]').next().text('商品名称已存在');
				flag=false;
			}
			}
		})
		return flag;

	}
	function goodsdesc(goods_desc){
		var reg			=	/^[\u4e00-\u9fa5\w.\-]{1,16}$/;
		if(!reg.test(goods_desc)){
			$('input[name="goods_desc"]').next().text('商品描述必须由中文，字母，下划线组成');
			return false;
		}
		return true;
	}
	$('input[name="goods_desc"]').blur(function(){
		$(this).next().text('');
		var goods_desc	= $(this).val();
			goodsdesc(goods_desc)
	})
	$('[type=button]').click(function(){
		var goods_name	= $('input[name="goods_name"]').val();
		var names 		= goodsname(goods_name)
		
		//商品描述
		var goods_desc	= $('input[name="goods_desc"]').val();
		var desc  		= goodsdesc(goods_desc)
		if(desc == true && names==true){
		
			$('form').submit();
		}
	})
</script> -->
</html>