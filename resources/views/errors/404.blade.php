{{-- \resources\views\errors\404.blade.php --}}
<!DOCTYPE HTML>
<html>
	<head>
		<title>404 Not Found</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="404 iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href="{{ asset('css/404style.css') }}" rel="stylesheet" type="text/css"  media="all" />
	</head>
	<body>
		<!--start-wrap--->
		<div class="wrap">
			<!---start-header---->
				<div class="header">
					<div class="logo">
						<h1><a href="#">Ohh</a></h1>
					</div>
				</div>
			<!---End-header---->
			<!--start-content------>
			<div class="content">
				<img src="{{ asset('images/404imgs/error-img.png')}}" title="error" />
				<p><span><label>O</label>hh.....</span>You Requested the page that is no longer There.</p>
                <a href="{{env('APP_URL')}}">Back To Home</a>
				<div class="copy-right">
					<p>&#169 All rights Reserved | Designed by <a href="http://w3layouts.com/">W3Layouts</a></p>
				</div>
   			</div>
			<!--End-Cotent------>
		</div>
		<!--End-wrap--->
	</body>
</html>