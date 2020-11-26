<!DOCTYPE html>
<html>
<head>
  <title>show page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
        font-size: 25px;
    }
    .card-title, .ChineseInfor {
        font-family: 'ysyrxk';
        font-size: 30px;
    }
    pre {
        white-space: pre-wrap;
    }
    .card-body {
        background-repeat: repeat;
        background-position: center center;
        background-attachment:fixed;
    }
  </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div style="display: flex;flex-direction:row;justify-content:space-between;">
                    <h4 class="card-title">{{ $abbre }}</h4>
                    <audio id="audio_element" controls>
                        <source src="{{ env('APP_URL').$audio_path }}">
                    </audio>
                </div>
            </div>
            <div class="card-body" style="background-image: url({{asset('images/bglove.jpg')}});">
                <pre id="introContain" style="color: #fff;"></pre>
            </div> 
            <div class="card-footer">
                <button id="explbtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    点此查看释义
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
                  <h4 class="modal-title">中文释义</h4>
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
        
    </div>
    <div class="content"></div>
<script src="{{ asset('js/engpro/engpro.js') }}"></script>
@include('sweetalert::alert')
</body>
</html>