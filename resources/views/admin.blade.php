<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>		
	<style type="text/css">

		body{
			margin : 0px;
			font-family: 'Noto Sans';
		}

		.sidenav{
			margin: 0px;
			min-height: 662px;	
			width:16%;
			background-color:#935D2E;
			position: fixed;
			top:0px;
			color:white;

		}

		.sidenav a{
			color:white;
			text-decoration: none;
		}		

		.content{
			width: 84%;
			margin-top: 0px;
			margin-left:16%;
			background-color:#DEDED6;
			min-height: 662px;
			display: inline-block; 
			
		}		
	</style>
</head>
<body>
	<div class="sidenav">
		<ul>
			<a href=#><li>Pelanggan</li></a>
			<a href='/admin/menu'><li>Menu</li></a>
			<a href=#><li>Bahan</li></a>
			<a href=#><li>Meja</li></a>
			<a href=#><li>Pembuatan</li></a>
			<a href=#><li>Pemesanan</li></a>
		</ul>
	</div>
	<div class="content">
		@yield('content')
	</div>
</body>
</html>