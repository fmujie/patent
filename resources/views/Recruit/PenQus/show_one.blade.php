<!DOCTYPE html>
<html>

<head>
    <title>题目编辑</title>
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
        .list-group-item {
            padding: 0.45rem 0.45rem !important;
        }
        .card {
            opacity: 0.95;
        }
        .card-body {
            padding: 0rem !important;
        }
        .table {
            margin-bottom: 0rem !important;
        }
        .self-bgdiv {
            background-color: rgba(255, 255, 255, 0.80);
        }
        @media (min-width: 1200px) {
            .container {
                max-width: 1440px;
            }
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
            <h2 class="display-3">{{ $department }}题组编辑</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/recruit/qus/desview')}}">Return design page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit page</li>
                </ol>
            </nav>
            <div class="self-bgdiv mb-3 rounded">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">选择类题目</h4>
                    @switch($status)
                        @case(0)
                        <button type="button" class="btn btn-info">可编辑</button>
                        @break
                        @case(1)
                        <button type="button" class="btn btn-warning">已锁定</button>
                        @break
                        @default
                        <button type="button" class="btn btn-success">已开放</button>
                        @break
                    @endswitch
                    <!-- 按钮：用于打开模态框 -->
                    <button type="button" class="btn btn-dark bt-middle" data-toggle="modal" data-target="#setStatus">
                        <a href="#" class="text-white" data-toggle="tooltip" data-placement="top" title="题组状态设定">题组状态设定</a>
                    </button>
                    <button type="button" class="btn btn-primary bt-right" data-toggle="modal" data-target="#selModal">
                        <a href="#" class="text-white" data-toggle="tooltip" data-placement="top" title="点击增加选择类题型">添加题目模板</a>
                    </button>
                    <!-- 模态框 -->
                    <div class="modal fade" id="selModal">
                        <div class="modal-dialog">
                        <div class="modal-content">
                    
                            <!-- 模态框头部 -->
                            <div class="modal-header">
                            <h4 class="modal-title">添加选择类题目</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                    
                            <!-- 模态框主体 -->
                            <div class="modal-body">
                                <form action="/recruit/qus/addqus/{{ $qusGpId }}" name="addQusForm" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="qusType">增添题目类型:</label>
                                        <select class="form-control" name="qusType" id="qusType">
                                          <option value="sg_sel">单选题</option>
                                          <option value="mt_sel">多选题</option>
                                          <option value="gp_fil">填空题</option>
                                          <option value="sk_tch">简答题</option>
                                        </select>
                                        <br>
                                        <label for="qusNum">添加题目数量:</label>
                                        <select class="form-control" name="qusNum" id="qusNum">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                        </select>
                                      </div>
                                      <div class="text-center">
                                        <button type="submit" class="btn btn-primary center-block">立即添加</button>
                                      </div>
                                  </form>
                            </div>
                    
                            <!-- 模态框底部 -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                            </div>
                    
                        </div>
                        </div>
                    </div>
                    <!-- 模态框 -->
                    <div class="modal fade" id="setStatus">
                        <div class="modal-dialog">
                        <div class="modal-content">
                    
                            <!-- 模态框头部 -->
                            <div class="modal-header">
                            <h4 class="modal-title">题组状态设定</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                    
                            <!-- 模态框主体 -->
                            <div class="modal-body">
                                <form action="/recruit/qus/setstatus/{{ $qusGpId }}" name="setQusForm" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="qusType">设置当前题组状态:</label>
                                        <select class="form-control" name="setStatus" id="setStatus">
                                          <option value="0">可编辑状态</option>
                                          <option value="1">已锁定状态</option>
                                          <option value="2">已开放状态</option>
                                        </select>
                                      </div>
                                      <div class="text-center">
                                        <button type="submit" class="btn btn-primary center-block">立即设定</button>
                                      </div>
                                  </form>
                            </div>
                    
                            <!-- 模态框底部 -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                            </div>
                    
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive-xl" style="opcity: 0.5">
                    <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th>题号</th>
                            <th>题型</th>
                            <th>题目内容</th>
                            <th>题目选项</th>
                            <th class="text-center">操作该题</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($selDatas as $key => $value)
                            <div class="row">
                                <tr>
                                    <td>
                                        <li class="list-group-item list-group-item-secondary" style="user-select:none;max-width:50px">{{ $key + 1 }}</li>
                                    </td>
                                    <td>
                                        <li class="text-nowrap list-group-item list-group-item-secondary" style="user-select:none;max-width:50px">
                                        @if ($value['qus_type'] == 'sg_sel')
                                        {{ "单选" }}
                                        @else
                                        {{ "多选" }}
                                        @endif
                                        </li>
                                    </td>
                                    <td>
                                        <form class="form-inline" action="/recruit/qus/update/sel/{{ $value['qus_id'] }}" name="{{ 'selQus' . $value['qus_id'] }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input class="bg-info text-light" type="text" class="form-control" name="qusCt" id="{{'sel' . $key . 'Qus' }}" value="{{ $value['qus_content'] }}" title="{{ $value['qus_content'] }}" data-toggle="tooltip" data-placement="top" placeholder="Please type content">
                                    </td>
                                    <td>
                                        <div style="display: flex; flex-direction: row;">
                                            @if ($value['qus_sel'] != null)
                                                @foreach ($value['qus_sel'] as $ke => $va)
                                                <input class="bg-success text-light" type="text" class="form-control" name="{{ "qusSelC" . $va['qus_selid'] }}" id="{{'sel' . $key . 'Qus' . $va['qus_selid']}}" value="{{ $va ['qus_selct'] }}" title="{{ $va['qus_selct'] }}" data-toggle="tooltip" data-placement="top" placeholder="Please type content">
                                                @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="container">
                                            <button type="submit" id="{{ 'btn-sel' . $key }}" class="btn btn-dark mr-2" title="点击更新该题目" data-toggle="tooltip" data-placement="top" disabled>Update</button>
                                        </form>
                                        <a href="/recruit/qus/delete/{{ $value['qus_id'] }}" class="btn btn-danger" title="点击删除该题目" data-toggle="tooltip" data-placement="right">Delete</a>
                                    </div>
                                    </td>
                                </tr>
                            </div>
                        @endforeach  
                        </tbody>
                    </table>
                    
                </div> 
            </div>
            <div class="self-bgdiv mb-3 rounded col-lg-12">
                <div class="card-header">
                    <h4 class="card-title">简述类题目</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th>题号</th>
                            <th>题型</th>
                            <th>题目内容</th>
                            <th>操作该题</th>
                          </tr>
                        </thead>
                        <tbody>
                            <div class="row">
                        @foreach ($gpSkDatas as $key => $value)
                                <tr>
                                    <td>
                                        <li class="list-group-item list-group-item-secondary" style="user-select:none;max-width:35px">{{ $key + 1 }}</li>
                                    </td>
                                    <td class="d-inline-flex justify-content">
                                        <li class="list-group-item list-group-item-secondary" style="user-select:none;max-width:50px">
                                        @if ($value['qus_type'] == 'gp_fil')
                                        {{ "填空" }}
                                        @else
                                        {{ "简答" }}
                                        @endif
                                        </li>
                                    </td>
                                    <td>
                                        <form action="/recruit/qus/update/gpsk/{{ $value['qus_id'] }}" name="{{ 'gpSk' . $value['qus_id'] }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input class="bg-info text-light" type="text" class="form-control" name="qusCt" id="{{'gpSkQus' . $value['qus_id'] }}" value="{{ $value['qus_content'] }}" title="{{ $value['qus_content'] }}" data-toggle="tooltip" data-placement="top" placeholder="Please type content">
                                    </td>
                                    <td>
                                        <button type="submit" id="{{ 'btn-' . 'gpSkQus' . $value['qus_id'] }}" class="btn btn-dark mr-2" title="点击更新题目" data-toggle="tooltip" data-placement="top" disabled>Update</button>
                                        </form>
                                        <a href="/recruit/qus/delete/{{ $value['qus_id'] }}" class="btn btn-danger" title="点击删除该题目" data-toggle="tooltip" data-placement="right">Delete</a>
                                    </td>
                                </tr>
                        @endforeach  
                        </tbody>
                    </div>
                      </table>
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
    <script src="{{asset('js/recruit/editQus.js')}}"></script>
</body>

</html>