@foreach($data as $v)
		<tr>
			<td>{{$v->new_id}}</td>
			<td>{{$v->new_name}}</td>
			<td>{{$v->new_author}}</td>
            <td>{{$v->new_desc}}</td>
            <td>{{$v->cart_name}}</td>
            <td>
                <a href="{{url('goods/edit/'.$v->goods_id)}}"  class="btn btn-info">编辑</a>
                <a href="{{url('goods/del/'.$v->goods_id)}}"  class="btn btn-warning">删除</a>
            </td>
		</tr>
        @endforeach
    <tr>
        <td>{{$data->appends($query)->links()}}</td>
    </tr>s