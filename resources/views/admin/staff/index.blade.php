<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    <input type="text" name="staff_name" value="{{$query['staff_name']??''}}"><button>搜索</button>
</form>
    <table>
        <tr>
            <td>id</td>
            <td>姓名</td>
            <td>员工号</td>
            <td>部门</td>
            <td>头像</td>
            <td>操作</td>
        @foreach($data as $v)
        </tr>
            <td>{{$v->staff_id}}</td>
            <td>{{$v->staff_name}}</td>
            <td>{{$v->staff_mark}}</td>
            <td>{{$v->staff_branch}}</td>
            <td><img src="{{env('APP_UPLOADS')}}{{$v->staff_img}}" width="80px"></td>
            <td><a href="{{url('staff/del/'.$v->staff_id)}}">删除</a></td>
        @endforeach
        <tr>
            <td>{{$data->appends($query)->links()}}</td>
        </tr>
    </table>
</body>
</html>