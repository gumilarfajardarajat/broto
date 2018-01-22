<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
	<style type="text/css">
		body{
			margin : 0px 435px;
			font-family: 'Noto Sans';
		}



		.status{
			background-color : #935D2E;
			height: 13px;
			position: fixed;
			
		}

		.navigasi{
			background-color : #BD7E48;
			box-shadow : 0 1px 3px #643F20; 
			width: 478px;
			height: 63px;
			position: fixed;
			top: 0px;
			margin:0;	
			
		}
		
		.bg{
			background-color: #DEDED6;
			width: 478px;
			height: 662px;
			margin-top:63px;
			

			
		}				
	</style>
</head>
<body>		
	<div class="navigasi">			
		<a href="@yield('back')">
			<div class="rw" style=" width: 30.5%;  float:left;">
				<img src="/img/back.png" style="display:block; margin-top:18px; margin-left:20px; height:26px ">
			</div>
		</a>
		<div class="rw" style=" width: 39%;  float:left;">
			<h1 style="color:white; font-size:25px; text-align:center;">@yield('menu')</h1>
		</div>
		<div class="rw" style=" width: 30.5%;  float:left;">
			<a href="#">
				<span style="font-size:18px; color:white; margin-top:18px; margin-right:20px; text-decoration:none; display:block; float:right;">0
				</span>
				<img src="/img/daftar.png" style="display:block; margin-top:18px; margin-right:10px; height:22px; float:right;">				
			</a>					
		</div>
	</div>
	<div class="bg">
		<div class="content" style=" margin:0 6.5%;  padding-top: 46px;">
			@yield('isi')													
		</div>
		@yield('bg')
	</div>	
</body>
</html>