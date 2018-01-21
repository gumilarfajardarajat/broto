<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		body{
			margin : 0px 435px;
		}

		.bg{
			background-color: #DEDED6;
			height: 662px;
		}

		.status{
			background-color : #935D2E;
			height: 13px;
			
		}

		.navigasi{
			background-color : #BD7E48;
		
			height: 63px;
			
		}		
	</style>
</head>
<body>
	<div class="bg">
		<div class="status"></div>
		<div class="navigasi">
			<div class="rw" style="background-color:black; width: 495px; height:100%; display: inline-block;"></div>
			<div class="rw" style="background-color:blue; width: 143px; height:100%; display: inline-block;"></div>
			<div class="rw" style="background-color:black; width: 193px; height:100%; display: inline-block;"></div>
			<div class="rw" style="background-color:blue; width: 143px; height:100%; display: inline-block;"></div>
			@yield('navigasi')
		</div>
		@yield('content')
	</div>
</body>
</html>