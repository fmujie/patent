<!DOCTYPE html>
<html>
<head>
  <title>上传信息</title>
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
      <h1 class="display-3">Add Information</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/engpro/add_infor_view/')}}">Return add page</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/engpro/show_info/')}}">Information page</a> </li>
        </ol>
    </nav>
      <form action="/engpro/add_data" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="abbre">简称:</label>
          <input type="text" class="form-control" id="abbre" name="abbre" placeholder="Please enter abbreviation" required />
        <label for="content">内容:</label>
          <textarea class="form-control" rows="5" id="content" name="intro" placeholder="Please enter details" required></textarea>
        <p>上传音频文件:</p>
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" id="audioFile" name="audioFile" required>
          <label class="custom-file-label" for="audioFile">选择文件</label>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary">提交</button>
        </div>
      </form>
    </div>
    @include('sweetalert::alert')
</body>
</html>