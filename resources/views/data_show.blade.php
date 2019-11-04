<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap 实例</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/dataShow.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
            <h1 class="display-3">Display 3</h1>
            <div class="row">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>公开号</th>
                            <th>标题</th>
                            <th>公开（公告）日</th>
                            <th>原始申请（专利）人</th>
                            <th>摘要</th>
                            <th>下载PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id}}</td>
                            <td>{{ $data->public_number}}</td>
                            <td>{{ $data->title}}</td>
                            <td>{{ $data->public_begin_date}}</td>
                            <td>{{ $data->origin_name}}</td>
                            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    摘要
                                </button>
                                <!-- 模态框 -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- 模态框头部 -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">摘要</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- 模态框主体 -->
                                            <div class="modal-body" style="color: black;">
                                                {{ $data->abstract}}
                                            </div>

                                            <!-- 模态框底部 -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <th><a href="./pdfDld">点此跳转</a></th>
                        </tr>
                        <tr>
                            <td>{{ $data->id}}</td>
                            <td>{{ $data->public_number}}</td>
                            <td>{{ $data->title}}</td>
                            <td>{{ $data->public_begin_date}}</td>
                            <td>{{ $data->origin_name}}</td>
                            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    摘要
                                </button>
                                <!-- 模态框 -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- 模态框头部 -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">摘要</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- 模态框主体 -->
                                            <div class="modal-body">
                                                <p id="md_bd_sw">
                                                    {{ $data->abstract}}
                                                </p>
                                            </div>

                                            <!-- 模态框底部 -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <th><a href="./pdfDld">点此跳转</a></th>
                        </tr>
                        <tr>
                            <td>{{ $data->id}}</td>
                            <td>{{ $data->public_number}}</td>
                            <td>{{ $data->title}}</td>
                            <td>{{ $data->public_begin_date}}</td>
                            <td>{{ $data->origin_name}}</td>
                            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    摘要
                                </button>
                                <!-- 模态框 -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- 模态框头部 -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">摘要</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- 模态框主体 -->
                                            <div class="modal-body">
                                                {{ $data->abstract}}
                                            </div>

                                            <!-- 模态框底部 -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <th><a href="./pdfDld">点此跳转</a></th>
                        </tr>
                        <tr>
                            <td>{{ $data->id}}</td>
                            <td>{{ $data->public_number}}</td>
                            <td>{{ $data->title}}</td>
                            <td>{{ $data->public_begin_date}}</td>
                            <td>{{ $data->origin_name}}</td>
                            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    摘要
                                </button>
                                <!-- 模态框 -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- 模态框头部 -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">摘要</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- 模态框主体 -->
                                            <div class="modal-body">
                                                {{ $data->abstract}}
                                            </div>

                                            <!-- 模态框底部 -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <th><a href="./pdfDld">点此跳转</a></th>
                        </tr>
                        <tr>
                            <td>{{ $data->id}}</td>
                            <td>{{ $data->public_number}}</td>
                            <td>{{ $data->title}}</td>
                            <td>{{ $data->public_begin_date}}</td>
                            <td>{{ $data->origin_name}}</td>
                            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    摘要
                                </button>
                                <!-- 模态框 -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- 模态框头部 -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">摘要</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- 模态框主体 -->
                                            <div class="modal-body">
                                                {{ $data->abstract}}
                                            </div>

                                            <!-- 模态框底部 -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <th><a href="./pdfDld/{{ $data->public_number }}">点此跳转</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>