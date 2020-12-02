<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookStore</title>
</head>
<body>
<div align="center">
    <h1>user list </h1><br>
    <table border="1">
        <thead border="1">
        <tr>
            <th><h3><strong>BookName</strong></h3></th>
            <th><h3><strong>Author</strong></h3></th>
            <th><h3><strong>AuthorEmail</strong></h3></th>
            <th><h3><strong>operation</strong></h3></th>
        </tr>
        </thead>
        <tbody>
        @foreach($allLibrary as $library)
            <tr>
                <th>{{$library->BookName}}</th>
                <th>{{$library->Author}}</th>
                <th>{{$library->AuthorEmail}}</th>
                <td>
                    <form action="{{url('library/'.$library->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <button type="submit" >up date</button>
                    </form>
                    <form action="{{url('library/'.$library->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" >delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
    <form action="{{url('library/create')}}" method="get">
        {{csrf_field()}}
        <button type="submit" >creat an account</button> </form>
</div>
</body>
</html>
