<!DOCTYPE html>
<html>

<head>
    <title>青春在线笔试系统</title>
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
            <h2 class="text-center mt-3 text-black-50">个人报名信息</h2>
            <div class="row">
                <div class="col-sm-4">
                    {{-- <div class="card"> --}}
                        <img class="card-img-top rounded-circle" src="https://static.runoob.com/images/mix/img_avatar.png" alt="Card image" style="width:100%">
                        {{-- <div class="card-body"> --}}
                          {{-- <h4 class="card-title">John Doe</h4> --}}
                          {{-- <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p> --}}
                        {{-- </div> --}}
                      {{-- </div> --}}
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold text-muted">Profile</h4>
                        </div>
                        <div class="card-body">
                            <p class="d-flex justify-content-around">
                                <div class="d-inline">
                                    <img src="{{asset('images/rUserInfor/ruser.png')}}" class="d-inline mb-2" alt="sss" width="32px">
                                    <span class="font-weight-bold text-muted ml-2">姓名：</span>
                                </div>
                                <span class="font-weight-bold text-muted">房杰祥</span>
                            </p>
                            <p class="d-flex justify-content-around">
                                <div class="d-inline">
                                    <img src="{{asset('images/rUserInfor/ruser.png')}}" class="d-inline mb-2" alt="sss" width="32px">
                                    <span class="font-weight-bold text-muted ml-2">姓名：</span>
                                </div>
                                <span class="font-weight-bold text-muted">房杰祥</span>
                            </p>
                            <p class="d-flex justify-content-around">
                                <div class="d-inline">
                                    <img src="{{asset('images/rUserInfor/ruser.png')}}" class="d-inline mb-2" alt="sss" width="32px">
                                    <span class="font-weight-bold text-muted ml-2">姓名：</span>
                                </div>
                                <span class="font-weight-bold text-muted">房杰祥</span>
                            </p>
                        </div> 
                        <div class="card-footer">底部</div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>

</html>