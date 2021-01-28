<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/dataShow.css') }}">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.0.0/sweetalert.min.js"></script>
    @section('inlineStyle')
    @show
</head>

<body>
    <div class="area">
        <div class="container">
            @section('circles')
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            @show
            <h1 class="display-3">@yield('mainInfor')</h1>
            <nav aria-label="breadcrumb">
                @section('ol')
                @show
            </nav>
            @section('mainCont')
            @show
        </div>
    </div>
    @include('sweetalert::alert')
    @section('js')
    @show
    {{-- <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <script src="{{asset('js/recruit/editQus.js')}}"></script> --}}
</body>
</html>