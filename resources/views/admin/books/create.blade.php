<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('books/store')}}" method="post" enctype="multipart/form-data">
        <table>
        @csrf
            <tr>
                <td>图书名称</td>
                <td><input type="text" name="books_name"></td>
                <b>{{$errors->first('books_name')}}</b>
            </tr>
            <tr>
                <td>图书作者</td>
                <td><input type="text"name="books_desc"><b>{{$errors->first('books_desc')}}</b></td>
            </tr>
            <tr>
                <td>图书售价</td>
                <td><input type="text" name="books_price"></td>
            </tr>
            <tr>
                <td>图书封面</td>
                <td><input type="file" name="books_img"></td>
            </tr>
            <tr>
                <td></td>
                <td><button>添加</button></td>
            </tr>
        </table>
    </form>
</body>
</html>