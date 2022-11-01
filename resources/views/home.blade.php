<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/js/app.js')
</head>
<body>
<h1>Titulo</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
@endif
<form action="{{url('/')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file"><br>
    <br>
    <input type="submit" value="Subir">
</form>
</body>
</html>
