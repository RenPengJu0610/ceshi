<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>留言板</h2>
    <form action="{{url('comment/store')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h5>内容</h5>
        <textarea name="comment" cols="30" rows="10"></textarea><br/>
        <button type="submit">发布</button>
    </form>
           
</body>
</html>