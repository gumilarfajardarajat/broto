@extends('layouts.kasir')
@section('title','index')

@section('content')
	<div class="container">
		<h1 class="text-center">Pendapatan</h1>
		<div class="content" style="padding:20px 80px; background-color: white;">
			<table class="table" style="background-color: white;">
				<thead>
					<tr>
						<th>No Meja</th>
						<th>No Pelanggan</th>
						<th>Nama Pelanggan</th>
						<th>Total Pembayaran</th>
						<th>Status</th>
					</tr>

				</thead>
				<tbody>
					@foreach($pendapatan as $p)
					<tr>
						<td>{{$p->keterangan}}</td>
						<td>{{$p->no_pelanggan}}</td>
						<td>{{$p->nama_pelanggan}}</td>
						<td>Rp. {{number_format( $p->total, 0 , '' , '.' )}}</td>
						<td>{{$p->status}}</td>
					</tr>
					@endforeach
				</tbody>				
			</table>
			<div class="jumbotron">
				@foreach($jumlah as $j)
					<h1>Total Pendapatan : <br> Rp. {{number_format( $j->total, 0 , '' , '.' )}}</h1>
				@endforeach
			</div>
		</div>
	</div>

@endsection