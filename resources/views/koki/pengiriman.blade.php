@extends('layouts.pantry')
@section('title','index')

@section('css')


@endsection

@section('content')

	<div class="container">
		<div class="content" style=" background-color: white;">			
			<table border="0" class="table borderless" style="background-color: white; ">
				
					@foreach($profil as $p)
						<tr>
							<th style="border-style : none; text-align: right;">No Antrian : </th>
							<td style="border-style : none; text-align: left;">{{$p->antrian}}</td>
							<th style="border-style : none; text-align: right;">Pemesan :</th>
							<td style="border-style : none; text-align: left;">{{$p->keterangan}}</td>
						</tr>
						<tr>
							<th style="border-style : none; text-align: right;">Nama Pelanggan :</th>
							<td style="border-style : none; text-align: left;">{{$p->nama_pelanggan}}</td>
							<th style="border-style : none; text-align: right;">Jumlah :</th>
							<td style="border-style : none; text-align: left;">{{$jumlah}}</td>
						</tr>						
					@endforeach				
			</table>
		</div>
	</div>
	<div class="container">
		<div class="content" style="padding:20px 80px; background-color: white;">
			

			<table class="table" style="background-color: white;">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Menu</th>
						<th>Jumlah </th>

						
					</tr>		
				</thead>
				<tbody>
					<?php
						$no = 0;
					?>
					@foreach($orderan as $order)
						<?php
							$no = $no + 1;
						?>
						<tr>
							<td>
								<?php
									echo($no);
								?>
							</td>
							<td>{{$order->nama_menu}}</td>
							<td>{{$order->jumlah}}</td>
							
						</tr>
					@endforeach		
				</tbody>				
			</table>
		</div>
	</div>

	<div class="container" style="margin-top: 20px">
		<a href="/koki/kirim/{{$antrian}}" class="btn btn-danger col-md-8 col-md-offset-2" style="text-decoration: none;"> 	
				Kirim			
		</a>
	</div>	
@endsection