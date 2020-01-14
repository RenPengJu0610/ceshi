<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品添加</title>
	<link rel="stylesheet" href="/static/admin/bootstrap.min.css">  
	<script src="/static/admin/jquery.min.js"></script>
	<script src="/static/admin/bootstrap.min.js"></script>
</head>
<body>
<h3>商品添加</h3><hr/>
<form class="form-horizontal" role="form" action="{{url('goods/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
			 基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">商品相册</a></li>
	<li><a href="#jmeter" data-toggle="tab">商品详情</a></li>
	
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>
		<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="goods_name" id="firstname" 
				   placeholder="请输入商品名称">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-10">
			<input type="text" name="goods_price" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-10">
			<select  name="brand_id" class="form-control" id="firstname" >
				<option value="">--请选择--</option>
				@foreach($brand as $v)
				<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-10">
			<select  name="cart_id" class="form-control" id="firstname" >
				<option value="">--请选择--</option>
				@foreach($cart_list as $v)
				<option value="{{$v->cart_id}}">@php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$v->level)."|——"; @endphp {{$v->cart_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品缩略图</label>
		<div class="col-sm-10">
			<input type="file" name="goods_img" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-10">
			<input type="text" name="goods_number" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-10">
			<input type="text" name="goods_sn" class="form-control" id="firstname" 
				   placeholder="请输入商品价格">
		</div>
	</div>
		</p>
	</div>
	<div class="tab-pane fade" id="ios">
		<p>
		<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-10">
			<input type="file" name="goods_imgs[]" multiple="multiple" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
		</p>
	</div>
	<div class="tab-pane fade" id="jmeter">
		<p>
		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品描述</label>
		<div class="col-sm-10">
			<input type="text" name="goods_desc"  class="form-control" id="lastname" 
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