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
    <style>
        p, span, h2, h5, li {
            user-select: none;
        }
        p {
            margin-bottom: 0.5rem;
        }
        li {
            padding: 5px !important;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.95);
        }
        .card-title {
            margin-bottom: 0rem !important;
        }
    </style>
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
            <h2 class="text-center mt-3 text-black-50">青春在线笔试系统</h2>
            <div class="card bg-light text-dark">
                <div class="card-body row d-flex justify-content-around">
                    <div>
                        <span class="font-weight-bold text-muted">笔试部门：</span>
                        <li class="list-group-item list-group-item-light d-inline rounded">程序部</li>
                    </div>
                    <div>
                        <span class="font-weight-bold text-muted">所属届次：</span>
                        <li class="list-group-item list-group-item-light d-inline rounded">2018</li>
                    </div>
                    <div>
                        <span class="font-weight-bold text-muted">参试成员：</span>
                        <li class="list-group-item list-group-item-light d-inline rounded">房杰祥</li>
                    </div>
                </div>
              </div>
            @if(!empty($sgSelDt))
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="card-title font-weight-bold text-muted">单项选择题</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($sgSelDt as $key => $value)
                            <div class="mb-3">
                                <p class="text-secondary font-weight-bold">
                                    <span class="badge badge-pill badge-secondary">
                                        {{ ($key + 1) . '、'}}
                                    </span>
                                    {{ $value['qus_content'] }}
                                </p>    
                                <div class="ml-4">
                                    @foreach ($value['qus_sel'] as $ke => $val)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="{{"sgSel" . $val['qus_selid']}}" name="{{ 'sel' . $key }}">
                                                <label class="custom-control-label text-secondary" for="{{"sgSel" . $val['qus_selid']}}">
                                                    {{ $val['qus_selct'] }}
                                                </label>
                                            </div>
                                    @endforeach
                            </div>
                            </div>
                        @endforeach
                    </div> 
                </div>
            @endif
            @if (!empty($mtSelDt))
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="card-title font-weight-bold text-muted">多项选择题</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($mtSelDt as $key => $value)
                            <div class="mb-3">
                                <p class="text-secondary font-weight-bold">
                                    <span class="badge badge-pill badge-secondary">
                                        {{ ($key + 1) . '、'}}
                                    </span>
                                    {{ $value['qus_content'] }}
                                </p>
                                <div class="ml-4">
                                    @foreach ($value['qus_sel'] as $ke => $val)
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="{{"mtSel" . $val['qus_selid']}}" name="{{"mtSel" . $key}}">
                                            <label class="custom-control-label text-secondary" for="{{"mtSel" . $val['qus_selid']}}">
                                                {{ $val['qus_selct'] }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach    
                    </div> 
                </div>
            @endif
            @if ($gpFilDt != null)
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="card-title font-weight-bold text-muted">填空题</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($gpFilDt as $key => $value)
                            <div class="mb-4">
                                <span class="text-secondary font-weight-bold inline-block">
                                    <span class="badge badge-pill badge-secondary">
                                        {{ ($key + 1) . '、'}}
                                    </span>
                                    {{ $value['gpFtPtn'] }}
                                    <input class="bg-info bg-light text-dark d-inline" style="width:90px" type="text" class="form-control" name="qusCt" id="{{'sel' . $key . 'Qus' }}" value="哈哈哈哈">
                                    {{ $value['gpEdPtn'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($skTchDt !== null)
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="card-title font-weight-bold text-muted">简述题</h5>
                    </div>
                    <div class="card-body">
                        @foreach($skTchDt as $key => $value)
                            <p class="text-secondary font-weight-bold">
                                <span class="badge badge-pill badge-secondary">
                                    {{ ($key + 1) . '、'}}
                                </span>
                                {{ $value['qus_content'] }}
                            </p>
                            <div class="form-group">
                                <label class="text-muted" for="comment">请陈述:</label>
                                <textarea class="form-control" rows="2" id="comment"></textarea>
                            </div>
                        @endforeach    
                    </div> 
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary">一键交卷</button>
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