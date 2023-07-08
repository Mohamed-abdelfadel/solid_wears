
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('font_awesome/css/all.min.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('imgs/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">

    <!--<title>Dashboard Sidebar Menu</title>-->
</head>
<body>

@include('sidebar')
<section class="home">

    @yield('content')



</section>

<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
<script src="{{asset('font_awesome/js/all.min.js')}}" ></script>
<script src="{{asset('js/script.js')}}" ></script>




</body>
</html>
