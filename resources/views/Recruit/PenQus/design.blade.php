<!DOCTYPE html>
<html>
<head>
  <title>题目模板设计</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/dataShow.css') }}">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script  src="js/jquery-1.3.2.min.js"></script>
	{{-- <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script> --}}
	{{-- <link rel="stylesheet" href="../css/style.css"> --}}
	<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.0.0/sweetalert.min.js"></script>
</head>
<body>
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

    <div class="container mt-3">
      <h1 class="display-3">Written test topic design</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/recruit/qus/viewgp')}}">Return information page</a></li>
            <li class="breadcrumb-item" active>Design page</li>
        </ol>
    </nav>

      <form action="/recruit/qus/dsplt" method="POST">
        @csrf
        <label for="selDepart">选择部门:</label>
        <select class="form-control" name="bel_depart" id="selDepart">
            <option>综合部</option>
            <option>媒体中心</option>
            <option>新闻记者部</option>
            <option>品牌运营部</option>
            <option>技术支持部-程序</option>
            <option>技术支持部-美工</option>
            <option>技术支持部-闪客</option>
            <option>摄影小组</option>
        </select>
        <label for="selGrad">选择届次:</label>
        <select class="form-control" name="bel_period" id="selGrad">
            <option>2018</option>
            <option>2019</option>
            <option>2020</option>
            <option>2021</option>
        </select>
        <label for="preSC">选择预设单选数量:</label>
        <select class="form-control" name="pre_single" id="preSC">
            <option>5</option>
            <option>4</option>
            <option>3</option>
            <option>2</option>
            <option>1</option>
            <option>0</option>
        </select>
        <label for="preMC">选择预设多选数量:</label>
        <select class="form-control" name="pre_multiple" id="preMC">
            <option>5</option>
            <option>4</option>
            <option>3</option>
            <option>2</option>
            <option>1</option>
            <option>0</option>
        </select>
        <label for="preFB">选择预设填空数量:</label>
        <select class="form-control" name="pre_gapfil" id="preFB">
            <option>5</option>
            <option>4</option>
            <option>3</option>
            <option>2</option>
            <option>1</option>
            <option>0</option>
        </select>
        <label for="preSA">选择预设简答数量:</label>
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
    </div>
    @include('sweetalert::alert')
</body>
</html>