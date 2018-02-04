@extends('layouts.pantry')
@section('title','index')

@section('content')
	<div class="container">
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
							<td><a href="/koki/resep/show/{{$m->kode_menu}}" class="btn btn-primary">Edit</a></td>
							<!-- <td><a href="/koki/resep/add/{{$m->kode_menu}}" class="btn btn-primary">Edit</a></td> -->
						</tr>
					@endforeach		
				</tbody>				
			</table>
		</div>
	</div>
@endsection