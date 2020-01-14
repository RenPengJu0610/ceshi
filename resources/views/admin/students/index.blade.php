<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>ID</td>
            <td>学生姓名</td>
            <td>学生性别</td>
            <td>学生班级</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->students_id}}</td>
            <td>{{$v->students_name}}</td>
            <td>{{$v->students_sex}}</td>
            <td>{{$v->students_class}}</td>
            <td>
                <a href="{{url('students/edit/'.$v->students_id)}}">修改</a>
                <a href="{{url('students/destroy/'.$v->students_id)}}">删除</a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td>{{$data->links()}}</td>
        </tr>
    </table>
</body>
</html>