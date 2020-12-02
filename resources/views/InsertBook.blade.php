<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InsertBook</title>
</head>
<body>
@if($errors->any())
    <div class="error">

        <h2>Errors List</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
@endif
<div align="center">
    <h1>Insert Book Data</h1>
    <form action="{{url('Library')}}" method="post">
        {{csrf_field()}}
        <label for="BookName">BookName: </label>
        <input type="text" name="BookName" ><br>
        <label for="Author">Author: </label>
        <input type="text" name="Author" ><br>
        <label for="AuthorEmail">AuthorEmail:</label>
        <input type="email" name="AuthorEmail" ><br>
        <input type="submit" value="save"><br>
    </form>
    <form action="{{url('Library')}}" method="get">
        {{csrf_field()}}

        <button type="submit" >show the table</button>
    </form>
</div>
</body>
</html>
