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
        src: url('{{ asset('./font/ysyrxk.ttf') }}');
        font-weight: normal;
        font-style: normal;
    }

    #introContain {
        font-family: 'ysyrxk'!important;
        font-size: 25px;
    }
    .card-title {
        font-family: 'ysyrxk'!important;
        font-size: 30px;
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
            <div class="card-body">
                <div id="introContain" style="text-indent: 2em;"></div>
            </div> 
            <div class="card-footer">
                <a href="#" class="card-link">Card link</a>
                <span id="curIntro" style="display: none"> {{ $intro }} </span>
                <span id="durationTime" style="display:none"> {{ $duration_time }} </span>
            </div>
        </div>
    </div>
    <div class="content"></div>
<script>
    $(document).ready(function () {
        let introContain = document.querySelector('#introContain')
        let introText = $("#curIntro").html()
        let durationTime = $("#durationTime").html()
        let data = introText.split('')
        let index = 0
        let interval = (parseFloat(durationTime) * 1000) / data.length
        function writing() {
            var audio = document.getElementById('audio_element');
            if (!audio.paused && index < data.length) {
                introContain.innerHTML += data[index]
                setTimeout(writing.bind(this), interval, ++index)
            }
        }

        $('audio').bind('play', function(){
		    writing()
	    })
        $('audio').bind('pause', function(){
            writing(index)
	    })
	
    });
</script>
@include('sweetalert::alert')
</body>
</html>