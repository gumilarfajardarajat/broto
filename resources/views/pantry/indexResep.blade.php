@extends('layouts.pantry')
@section('title','index')

@section('content')
	<div class="container">
		<h1 class="text-center">Resep</h1>
		<div class="content" style="padding:20px 80px; background-color: white;">
			<table class="table" style="background-color: white;">
				<thead>
					<tr>
						<th>Daftar Resep</th>
					</tr>		
				</thead>
				<tbody>
					@foreach($menu as $m)
						<tr>
							<td>{{$m->nama_menu}}</td>
							<td>
								<a href="/pantry/resep/show/{{$m->kode_menu}}" class="btn btn-primary">Detail</a>
							</td>

						</tr>
					@endforeach		
				</tbody>				
			</table>
		</div>
	</div>

@endsection