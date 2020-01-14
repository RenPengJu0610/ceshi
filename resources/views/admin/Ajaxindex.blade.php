
    @foreach($data as $v)
		<tr>
			<td><img src="{{env('APP_UPLOADS')}}{{$v->brand_logo}}" width="80">{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
            <td>{{$v->brand_desc}}</td>
            <td>
                <a href="{{url('brand/edit/'.$v->brand_id)}}"  class="btn btn-info">编辑</a>
                <a href="{{url('brand/del/'.$v->brand_id)}}"  class="btn btn-warning">删除</a>
            </td>
		</tr>
    @endforeach 
    <tr>
        <td>{{$data->appends($quest)->links()}}</td>
    </tr>