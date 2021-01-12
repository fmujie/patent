<!DOCTYPE html>
<html>
<head>
    <title>show page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/yanHua.css') }}"> --}}
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    {{-- video --}}
    <script src="{{ asset('js/videoJs/modernizr.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/videoCss/normalize.css') }}" /><!--CSS RESET-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/videoCss/demo.css') }}"><!--演示页面样式，使用时可以不引用--> --}}
    <link href="{{ asset('css/videoCss/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/videoCss/style.css') }}">
  <style>
    #introContain::after{
        content: '|';
        animation: blink 1s infinite
    }

    @keyframes blink{
        from{
            opacity: 0;
        }
        to{
            opacity: 1;
        }
    }

    @font-face {
        font-family: 'ysyrxk';
        src: url('{{ asset('./font/HanBiaoBangYangMaoBiPinYin-2.ttf') }}');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'xbs';
        src: url('{{ asset('./font/xbs.OTF') }}');
        font-weight: normal;
        font-style: normal;
    }
    #introContain {
        font-family: 'xbs';
        font-size: 30px;
    }
    .card-title, .ChineseInfor {
        font-family: 'ysyrxk';
        font-size: 30px;
        text-align: center;
    }
    pre {
        overflow-x:hidden;
        white-space: pre-wrap;
        margin-bottom: 0rem !important;
    }
    .card-body {
        background-repeat: repeat;
        background-size: cover;
        /* background-position: center center; */
        /* background-attachment:fixed; */
        padding: 0rem !important;
    }
    .card-header {
        padding: .1rem .1rem !important;
    }
    .card-title {
        margin-bottom: 0rem !important;
    }
     #fire {
        position: absolute;
        z-index: -100;
        }
    .modal-backdrop {
        display: none;
    }
    .bglove {
        opacity: 0.5;
        width: 100%;
        /* height: 100%; */
        background-repeat：repeat;
    }
    /* 滚动条样式设置 */
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 5px;
        background-color: #F5F5F5;
    }
    ::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }
    ::-webkit-scrollbar-thumb {
        border-radius: 5px;
        -webkit-box-shadow: inset 0 0 6px rgba(112, 200, 241, 0.3);
        background-color: #555;
    }
    /* 滚动条样式设置 */
    .carousel-inner div {
        height: 210px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }
    .card-footer {
        padding: .55rem .25rem !important;
    }
  </style>
</head>
<body>
    <!-- partial:index.partial.html -->
    {{-- <div id="fire" class="camera -x">
        <div class="camera -y">
        <div class="camera -z">
            <div class="fireworks">
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            <div class="line">
                <div class="spark">
                <div class="fire"></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div> --}}
    <!-- partial -->
    <div class="container">
        <div class="card mt-1" style="background-color: rgba(255, 255, 255, 0.50);">
            <div class="card-header">
                <div style="display: flex;flex-direction:row;justify-content:space-between;">
                    <h5 class="card-title">{{ $abbre }}</h5>
                    <audio id="audio_element" style="opacity: 0.5; width: 225px;" controls>
                        <source src="{{ env('APP_URL').$audio_path }}">
                    </audio>
                </div>
            </div>
            <div class="card-body" id="scroll_div" style="background-image:url({{ env('APP_URL') . $bg_img}}); height:380px; position: relative; overflow:hidden;overflow-y: scroll;text-align: center;">
                <pre class="p-2" id="introContain" style="color: #fff;"></pre>
            </div>
            <div class="card-footer" style="display: flex; flex-direction: row; justify-content: space-around;">
                <span id="crtdt" class="text-secondary" style="padding-top: 9px;">{{ $crtdt }}</span>
                <button id="explbtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    亮了就点我
                </button>
                <span id="iflan" style="display: none">{{ $lan }}</span>
                <span id="curIntro" style="display: none"> {{ $intro }} </span>
                <span id="durationTime" style="display:none"> {{ $duration_time }} </span>
            </div>
        </div>
           
          <!-- 模态框 -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
           
                <!-- 模态框头部 -->
                <div class="modal-header">
                  <h4 class="modal-title">原来是备注</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
           
                <!-- 模态框主体 -->
                <div class="modal-body">
                  <pre class="ChineseInfor">{{ $trans }}</pre>
                </div>
           
                <!-- 模态框底部 -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                </div>
           
              </div>
            </div>
          </div>
          @if(!empty($imgsArr))
            <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel" style="height: 210px;">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="height: 210px;">
                    @foreach ($imgsArr as $key => $value)
                        @if($key == 0)
                            <div class="carousel-item active" style="background-image: url({{ env('APP_URL') . $value }})"></div>
                        @else
                            <div class="carousel-item" style="background-image: url({{ env('APP_URL') . $value }})"></div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        @endif
        @if ($video_path)
          <div class="wrapper mt-3">
            <div class="js-video">
                <video class="js-media" poster="{{ asset('video/jhmzy.png') }}">
                      <source src="{{ asset('video/jhmzy.mp4') }}" type="video/mp4" />
                    <p>你的浏览器不支持 HTML5 Video。</p>
                </video>
                <i data-playPause class="playPause fa fa-play ui-icon"><span></span></i>
                <div class="ui">
                  <div>
                    <div data-progress class="progress">
                      <div data-buffer class="progress-buffer"></div>
                      <div data-time class="progress-time"></div>
                    </div><!-- progress -->
                  </div>
                  <div>
                    <span class="timeDisplay"><i data-currentTime>0:00</i> / <i data-duration>0:00</i></span>
                  </div>
                  <div>
                    <i data-mute class="fa fa-volume-up ui-icon"></i>
                  </div>
                  <div>
                    <div data-volume="100" class="volumeControl"><span class="ui-slider-handle"></span></div>
                  </div>
                </div><!-- ui -->
                <i data-fullscreen class="fullscreen iconicfill-fullscreen" title="fullscreen"></i>
            </div><!-- js-video -->
          </div>
        @endif
    </div>
    <div class="content"></div>
<script src="{{ asset('js/engpro/engpro.js') }}"></script>
<script src="{{ asset('js/videoJs/vedio.js') }}"></script>
@include('sweetalert::alert')
</body>
</html>