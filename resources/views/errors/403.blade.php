<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/403style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <title>403 Forbidden</title>
</head>
<body>
    <div class="scene">
        <div class="overlay"></div>
        <div class="overlay"></div>
        <div class="overlay"></div>
        <div class="overlay"></div>
        <span class="bg-403">403</span>
        <div class="text">
          <span class="hero-text"></span>
          <span class="msg">can't let <span>you</span> in.</span>
          <span class="support">
            <span>unexpected?</span>
            <a href="#">contact support</a>
            <p><a href="{{ env('APP_URL') }}">Back To Home</a></p>
            <p><a href="javascript:history.go(-1)">Go Back</a></p>
          </span>
          
        </div>
        <div class="lock"></div>
      </div>
</body>
</html>