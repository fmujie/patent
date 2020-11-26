<!DOCTYPE html>
<html>

<head>
    <title>信息总览</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/dataShow.css') }}">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.0.0/sweetalert.min.js"></script>
</head>

<body>

    <div class="area">

        <div class="container">

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
            <h1 class="display-3">Written test design overview</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/recruit/qus/desview')}}">Return design page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Information page</li>
                </ol>
            </nav>
            <div class="row">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>部门名称</th>
                            <th>届次</th>
                            <th>单选数目</th>
                            <th>多选数目</th>
                            <th>填空数目</th>
                            <th>简答数目</th>
                            <th>创建时间</th>
                            <th>查看详细</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->bel_depart }}</td>
                            <td>{{ $data->bel_period }}</td>
                            <td>{{ $data->pre_single }}</td>
                            <td>{{ $data->pre_multiple }}</td>
                            <td>{{ $data->pre_gapfil }}</td>
                            <td>{{ $data->pre_sketch }}</td>
                            <td>{{ $data->created_at }}</td>
                            <th><a class="btn btn-info" href="./viewgp/info/{{ $data->id }}" target="_blank">点此跳转</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $datas->links() }}
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>