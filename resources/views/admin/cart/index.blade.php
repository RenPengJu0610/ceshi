<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{session('msg')}}
    <table border=1>
        <tr>
            <td>id</td>
            <td>分类名称</td>
            <td>操作</td>
        </tr>
        @foreach($arr as $v)
        <tr>
            <td>{{$v->cart_id}}</td>
            <td>@php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$v->level)."|——"; @endphp {{$v->cart_name}}</td>
            <td>
                <a href="{{url('cart/edit/'.$v->cart_id)}}">修改</a>
                <a href="{{url('cart/del/'.$v->cart_id)}}">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>