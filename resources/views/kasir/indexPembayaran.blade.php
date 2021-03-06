@extends('layouts.kasir')
@section('title','index')

@section('content')
	<div class="container">
		<h1 class="text-center">Pembayaran</h1>
		<div class="content" style="padding:20px 80px; background-color: white;">
			<table class="table" style="background-color: white;">
				<thead>
					<tr>
						<th>No Meja</th>
						<th>No Pelanggan</th>
						<th>Nama Pelanggan</th>
						<th>Total Pembayaran</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>

				</thead>
				<tbody>
					@foreach($pembayaran as $p)
					<tr>
						<td>{{$p->keterangan}}</td>
						<td>{{$p->no_pelanggan}}</td>
						<td>{{$p->nama_pelanggan}}</td>
						<td>Rp. {{number_format( $p->total, 0 , '' , '.' )}}</td>
						<td>{{$p->status}}</td>
						<td>
							<a href="/kasir/pembayaran/{{$p->no_pelanggan}}" class="btn btn-primary">Bayar</a>
						</td>
					</tr>
					@endforeach
				</tbody>				
			</table>
		</div>
	</div>

@endsection