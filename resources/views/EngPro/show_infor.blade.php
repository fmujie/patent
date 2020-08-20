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
            <h1 class="display-3">Information Overview</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/engpro/add_infor_view/')}}">Return add page</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Information page</a> </li>
                </ol>
            </nav>
            <div class="row">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>简称</th>
                            <th>内容概要</th>
                            {{-- <th>音频地址</th> --}}
                            <th>二维码</th>
                            <th>详细内容</th>
                            <th>页面地址</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->abbre }}</td>
                            <td>{{ str_limit($data->intro, 25), '......' }}</td>
                            {{-- <td>{{ $data->audio_path }}</td> --}}
                            <td>
                                <a data-toggle="modal" data-target="{{ '#' . substr($data->qr_path, 8, 10) }}">
                                    <img src="{{ env('APP_URL') . '/' . $data->qr_path }}" alt="QrCode" style="height:35px;">
                                </a>
                                <!-- 模态框 -->
                                <div class="modal fade" id="{{ substr($data->qr_path, 8, 10) }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- 模态框头部 -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: black">Big picture</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- 模态框主体 -->
                                            <div class="modal-body" style="color: black">
                                                <img src="{{ env('APP_URL') . '/' . $data->qr_path }}" alt="QrCode" style="height:450px;">
                                            </div>

                                            <!-- 模态框底部 -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td> 
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="{{ '#'.$data->abbre }}">
                                    摘要
                                </button>
                                <!-- 模态框 -->
                                <div class="modal fade" id="{{ $data->abbre }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- 模态框头部 -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: black">详情</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- 模态框主体 -->
                                            <div class="modal-body" style="color: black">
                                                {{ $data->intro }}
                                            </div>

                                            <!-- 模态框底部 -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <th><a href=".{{ $data->page_address }}">点此跳转</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $datas->links() }}
            </div>
        </div>
    </div>
    @include('sweet::alert')
</body>

</html>