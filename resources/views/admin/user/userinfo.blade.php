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
            @if($userinfo['admin_type'] == 1)
                <h3><a href="">管理员信息</a></h3>
                <h3><a href="">物流信息</a></h3>
                <h3><a href="">出库管理</a></h3>
           @else
                <h3><a href="">物流信息</a></h3>
                <h3><a href="">出库管理</a></h3>
           @endif
</table>
        

</body>
</html>