<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PH31174</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="col-sm-12">
            <h1 class="text-center">Quan li </h1>
            <a href="{{route('list')}}" class="nav-link">📃 Danh sach</a>
            @yield('content')
        </div>
    </div>
</body>

</html>
