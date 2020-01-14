<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('students/store')}}" method="post">
        <table border=1>
        @csrf
            <tr>
                <td>学生姓名</td>
                <td><input type="text" name="students_name"></td>
            </tr>
            <tr>
                <td>班级</td>
                <td>
                    <select name="students_class" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>学生性别</td>
                <td>
                    <input type="radio" value="1" name="students_sex">男
                    <input type="radio" value="2" name="students_sex">女
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                <button>添加</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>