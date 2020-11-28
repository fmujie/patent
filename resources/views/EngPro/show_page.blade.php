<!DOCTYPE html>
<html>
<head>
  <title>show page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/yanHua.css') }}">
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
        text-align: center;
    }
    pre {
        white-space: pre-wrap;
    }
    .card-body {
        background-repeat: repeat;
        background-position: center center;
        background-attachment:fixed;
        padding: 0rem !important;
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
  </style>
</head>
<body>
    <!-- partial:index.partial.html -->
    <div id="fire" class="camera -x">
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
    </div>
    <!-- partial -->
    <div class="container">
        <div class="card" style="background-color: rgba(255, 255, 255, 0.50);">
            <div class="card-header">
                <div style="display: flex;flex-direction:row;justify-content:space-between;">
                    <h4 class="card-title">{{ $abbre }}</h4>
                    <audio id="audio_element" controls>
                        <source src="{{ env('APP_URL').$audio_path }}">
                    </audio>
                </div>
            </div>
            <div class="card-body" style="height:328px; position: relative; overflow:hidden;overflow-y: scroll;">
                <img class="bglove" src="{{asset('images/bglove.jpg')}}" style="position: fixed; z-index: -10" alt="">
                <pre class="p-2" id="introContain" style="color: #fff;"></pre>
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