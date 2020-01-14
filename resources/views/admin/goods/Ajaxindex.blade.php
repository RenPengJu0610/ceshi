@foreach($data as $v)
		<tr>
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->goods_price}}</td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->cart_name}}</td>
            <td><img src="{{env('APP_UPLOADS')}}{{$v->goods_img}}" width="80"></td>
            <td>
                @if($v->goods_imgs)
                @foreach($v->goods_imgs as $vv)
                    <img src="{{env('APP_UPLOADS')}}{{$vv}}" width="80">
                
                @endforeach
                @else <span style="color:red">没有图片可展示</span>
                @endif
            </td>
            <td>{{$v->goods_desc}}</td>
            <td>
                <a href="{{url('goods/show/'.$v->goods_id)}}"  class="btn btn-info">详情</a>
                <a href="{{url('goods/edit/'.$v->goods_id)}}"  class="btn btn-info">编辑</a>
                <a href="{{url('goods/del/'.$v->goods_id)}}"  class="btn btn-warning">删除</a>
            </td>
		</tr>
        @endforeach
    <tr>
        <td>{{$data->appends($query)->links()}}</td>
    </tr>