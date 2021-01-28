@extends('layouts.Recruit.penQus.penQus')

@section('title', '题目模板设计')

@section('mainInfor', 'Written test topic design')

@section('ol')
  @parent
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/recruit/qus/viewgp')}}">Return information page</a></li>
    <li class="breadcrumb-item" active>Design page</li>
  </ol>
@endsection

@section('mainCont')
  @parent
  <form action="/recruit/qus/dsplt" method="POST">
    @csrf
    <label for="selDepart">选择部门:</label>
    <select class="form-control" name="bel_depart" id="selDepart">
        <option value="1">综合部</option>
        <option value="2">媒体中心</option>
        <option value="3">新闻记者部</option>
        <option value="4">品牌运营部</option>
        <option value="5">技术支持部-程序</option>
        <option value="6">技术支持部-美工</option>
        <option value="7">技术支持部-闪客</option>
        <option value="8">摄影小组</option>
    </select>
    <label for="selGrad">当前年份所属届次:(只可选择近三届)</label>
    <select class="form-control" name="bel_period" id="selGrad">
        <option selected="selected" value="{{ $period }}">{{ $period }}</option>
        <option>{{ $period - 1 }}</option>
        <option>{{ $period - 2 }}</option>
    </select>
    <label for="preSC">选择类预设单选数量:</label>
    <select class="form-control" name="pre_single" id="preSC">
        <option>5</option>
        <option>4</option>
        <option>3</option>
        <option>2</option>
        <option>1</option>
        <option>0</option>
    </select>
    <label for="preMC" class="text-light">选择类预设多选数量:</label>
    <select class="form-control" name="pre_multiple" id="preMC">
        <option>5</option>
        <option>4</option>
        <option>3</option>
        <option>2</option>
        <option>1</option>
        <option>0</option>
    </select>
    <label for="preFB" class="text-light">简述类预设填空数量:</label>
    <select class="form-control" name="pre_gapfil" id="preFB">
        <option>5</option>
        <option>4</option>
        <option>3</option>
        <option>2</option>
        <option>1</option>
        <option>0</option>
    </select>
    <label for="preSA" class="text-light">简述类预设简答数量:</label>
    <select class="form-control" name="pre_sketch" id="preSA">
        <option>5</option>
        <option>4</option>
        <option>3</option>
        <option>2</option>
        <option>1</option>
        <option>0</option>
    </select>
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </form>
@endsection