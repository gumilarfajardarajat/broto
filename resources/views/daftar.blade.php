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
			margin-top: 20px;
			background-color: #DEDED6;
			width: 478px;
			display: inline-block;
			padding-top:63px;
			min-height: 660px;

			
		}				
	</style>
</head>
<body>
	<div class="navigasi">		
        <a style="text-decoration: none; color:white; margin-top:20px; margin-left:20px; display: block;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
            {{ Auth::user()->keterangan }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
	</div>	
	<div class="bg">
		<img src="/img/logo.png" style="margin-left:30%; height:187px">
		<form action="/pemesanan/home" method="post" style="padding: 50px 80px 0">
		  	<div class="form-group">
			  	<label for="email">No Pelanggan :</label>		
				<input type="text" class="form-control" name="no_pelanggan" style="height:50px;" value="{{$no_pelanggan}}" readonly>
			</div>
			<div class="form-group">
				<label for="email">Nama Pelanggan :</label>
				<input type="text"  class="form-control" name="nama_pelanggan" style="height:50px;">
			</div>
			<input type="submit" value="Check In" style="background-color:#935D2E; border-style: none; width: 100%; color:white; height: 50px;">
			{{csrf_field()}}
		</form>
	</div>
</body>
</html>