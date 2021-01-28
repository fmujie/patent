@extends('layouts.Recruit.penQus.penQus')

@section('title', '题组信息总览')

@section('mainInfor', 'Written test design overview')

@section('ol')
  @parent
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/recruit/qus/desview')}}">Return design page</a></li>
    <li class="breadcrumb-item active" aria-current="page">Information page</li>
  </ol>
@endsection

@section('mainCont')
  @parent
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
                <th>题组状态</th>
                <th>查看详细</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->belDep->department }}</td>
                <td>{{ $data->bel_period }}</td>
                <td>{{ $data->pre_single }}</td>
                <td>{{ $data->pre_multiple }}</td>
                <td>{{ $data->pre_gapfil }}</td>
                <td>{{ $data->pre_sketch }}</td>
                <td>{{ $data->created_at }}</td>
                <td>
                    @switch($data->status)
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
                </td>
                <th><a class="btn btn-primary" href="./viewgp/info/{{ $data->id }}" target="_blank">点此跳转</a></th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $datas->links() }}
  </div>
@endsection