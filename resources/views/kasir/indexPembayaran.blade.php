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
					</tr>

				</thead>
				<tbody>
					<tr>
						<td>Meja 01</td>
						<td>1</td>
						<td>Gumilar</td>
						<td>200000</td>
						<td>Check Out</td>
					</tr>
				</tbody>				
			</table>
		</div>
	</div>

@endsection