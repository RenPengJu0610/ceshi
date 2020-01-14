@foreach($data as $v)
		<tr>
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->goods_price}}</td>
            <td><img src="{{env('APP_UPLOADS')}}{{$v->goods_img}}" width="80"></td>
            <td>{{$v->goods_desc}}</td>
            <td>
                <a href="{{url('goods/edit/')}}"  class="btn btn-info">编辑</a>
                <a href="{{url('goods/del/')}}"  class="btn btn-warning">删除</a>
            </td>
		</tr>
        @endforeach
    <tr>
        <td>{{$data->links()}}</td>
    </tr>