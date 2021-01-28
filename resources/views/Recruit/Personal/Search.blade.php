@extends('layouts.Recruit.penQus.penQus')

@section('title', '纳新查询')

@section('mainInfor', "Recruit query")

@section('mainCont')
  @parent
    <form action="/recruit/sort" method="GET">
        <div class="input-group mt-3 mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <a href="#" class="text-dark" data-toggle="tooltip" data-placement="top" title="按照部门意愿进行排序">Intention first</a>
                </span>
            </div>
        <select class="form-control" id="sel1" name="sortkey">
            <option value="1">综合部</option>
            <option value="2">媒体中心</option>
            <option value="3">新闻记者部</option>
            <option value="4">品牌运营部</option>
            <option value="5">技术支持部-程序</option>
            <option value="6">技术支持部-美工</option>
            <option value="7">技术支持部-闪客</option>
            <option value="8">摄影小组</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-success" type="submit" style="width: 120px">Sort</button>  
        </div>
        </div>
    </form>
    <form action="/recruit/srchres" method="GET">
        {{-- @csrf --}}
        <div class="input-group mb-3">
            <input type="text" name="srchkey" class="form-control" placeholder="Enter name or student ID for fuzzy query">
            <div class="input-group-append">
            <button class="btn btn-success" type="submit" style="width: 120px">Search</button>  
            </div>
        </div>
    </form>
    <div class="row">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>姓名</th>
                    <th>学院</th>
                    <th>专业</th>
                    <th>意向一</th>
                    <th>意向二</th>
                    <th>个人简介</th>
                    <th>综合测评</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        @if ($data->belCol)
                            {{ $data->belCol->name }}
                        @else
                            未填写
                        @endif
                    </td>
                    <td>{{ $data->class }}</td>
                    <td>{{ $data->belFDep->department }}</td>
                    <td>
                        @if ($data->belSDep)
                            {{ $data->belSDep->department }}
                        @else
                            未选择
                        @endif
                    </td>
                    <td>
                        <a href="#" class="text-white" data-toggle="modal" data-target="{{ '#' . 'intro' . $key }}">
                            {{ str_limit($data->introduction, 25, '...') }}
                        </a>
                        <!-- 模态框 -->
                        <div class="modal fade" id="{{ 'intro' . $key }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- 模态框头部 -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" style="color: black">Introduction</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- 模态框主体 -->
                                    <div class="modal-body" style="color: black">
                                        {{ $data->introduction }}
                                    </div>
                                    <!-- 模态框底部 -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <th><a class="btn btn-primary" href="./viewgp/info/{{ $data->id }}" target="_blank">点此跳转</a></th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex col-lg-12 justify-content-between">
            {{ $datas->appends(request()->all())->links() }}
            @if (isset($grade))
            <div class="float-right">
                <a href="{{ env('APP_URL') . '/export/' . "$grade" . '/' . request('sortkey') }}" class="btn btn-info text-white center">
                    Down Excel
                </a>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
  @parent
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
@endsection