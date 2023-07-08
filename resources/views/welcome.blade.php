<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('font_awesome/css/all.min.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('imgs/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
</head>
<body>
    <div class="container-fluid">
        <h1 class="display-1 d-flex justify-content-center title mt-5">SOLID WEARS</h1>
    </div>
    <div style="height: 500px"></div>

    <div class="d-flex justify-content-center ">
        <a href="{{route('login')}}" class="btn btn-success m-4 col-3 fs-3">Login</a>
        <a href="{{route('register')}}" class="btn btn-danger m-4 col-3 fs-3">register</a>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
    <script src="{{asset('font_awesome/js/all.min.js')}}" ></script>
    <script src="{{asset('js/script.js')}}" ></script>




</body>
</html>
