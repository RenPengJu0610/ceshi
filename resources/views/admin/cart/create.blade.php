<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url('cart/store')}}" method="post">
        @csrf
        父级分类：<select name="pid">
        <option value="0">--请选择--</option>
        @foreach($arr as $v)
            <option value="{{$v->cart_id}}">@php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$v->level)."|——"; @endphp {{$v->cart_name}}</option>
        @endforeach
        </select>
        分类名称：<input type="text" name="cart_name">
        <button>添加</button>
</form>
    
</body>
</html>