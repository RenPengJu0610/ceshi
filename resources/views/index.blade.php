<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('create')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>学生姓名</td>
            </tr>
            <tr>
                <td><button>提交</button></td>
            </tr>
        </table>
    </form>
</body>
</html>