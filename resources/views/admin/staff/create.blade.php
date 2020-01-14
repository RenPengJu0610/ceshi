<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <form action="{{url('staff/store')}}" method="post" enctype="multipart/form-data">
        <table border=1>
        @csrf
            <tr>
                <td>员工姓名</td>
                <td><input type="text" name="staff_name"></td>
            </tr>
            <tr>
                <td>员工号</td>
                <td><input type="text" name="staff_mark"></td>
            </tr>
            <tr>
                <td>部门</td>
                <td><input type="text" name="staff_branch"></td>
            </tr>
            <tr>
                <td>员工头像</td>
                <td><input type="file" name="staff_img"></td>
            </tr>
            <tr>
                <td></td>
                <td><button>添加</button></td>
            </tr>
        </table>
   </form>
</body>
</html>