@extends('layouts.pantry')
@section('title','pantry')

@section('content')
	<div class="container">
		<div class="content" style="padding:20px 80px; background-color: white;">
			<table class="table" style="background-color: white;">
				<thead>
					<tr>
						<th colspan="2">{{$menu->nama_menu}}</th>
					</tr>
					<tr>
						<th>Nama Bahan</th>
						<th>Takaran</th>						
					</tr>		
				</thead>
				<tbody>
					@foreach($bahan as $b)
						<tr>
							<th>{{$b->nama_bahan}}</th>
							<th>{{$b->takaran}} {{$b->satuan}}</th>						
						</tr>
					@endforeach	
				</tbody>				
			</table>
		</div>
	</div>
	<div class="container" style="margin-top: 20px">
		<a href="/pantry/resep/add/{{$menu->kode_menu}}" class="btn btn-danger col-md-8 col-md-offset-2">Edit</a>
	</div>		
@endsection