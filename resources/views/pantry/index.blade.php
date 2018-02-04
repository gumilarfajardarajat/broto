@extends('layouts.pantry')
@section('title','index')

@section('content')
	<div class="container">
		<h1 class="text-center">Pesanan</h1>
		<div class="content" style="padding:20px 80px; background-color: white;">
			<table class="table" style="background-color: white;">
				<thead>
					<tr>
						<th>No Antrian</th>
						<th>Pemesan</th>
						<th>Nama Pemesan</th>
						<th>Jumlah Pesanan</th>
						<th>Aksi</th>
						
					</tr>		
				</thead>
				<tbody>
					@foreach($orderan as $order)
						<tr>
							<td>{{$order->antrian}}</td>
							<td>{{$order->keterangan}}</td>
							<td>{{$order->nama_pelanggan}}</td>
							<td>{{$order->jumlah}}</td>
							<td>
								<a href="/pantry/pemesanan/{{$order->antrian}}/{{$order->jumlah}}" class="btn btn-primary">Ambil</a>
							</td>
						</tr>
					@endforeach		
				</tbody>				
			</table>
		</div>
	</div>
@endsection