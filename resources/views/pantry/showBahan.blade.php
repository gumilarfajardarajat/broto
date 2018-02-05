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
						<th>Aksi</th>						
					</tr>		
				</thead>
				<tbody>
					@foreach($bahan as $b)
						<tr>
							<th>{{$b->nama_bahan}}</th>
							<th>{{$b->takaran}} {{$b->satuan}}</th>
							<th>
						        <form action="/pantry/resep/show/{{$b->kode_bahan}}/{{$menu->kode_menu}}" method="post">
							        <button type="submit" name="submit" class="btn btn-danger btn-md">
							        	 Delete
							        </button>
									<input type="hidden" name="_method" value="DELETE">
									{{csrf_field()}}			         			        
						    	</form>								
							</th>						
						</tr>
					@endforeach	
				</tbody>				
			</table>
		</div>
	</div>
	<div class="container" style="margin-top: 20px">
		<a href="/pantry/resep/add/{{$menu->kode_menu}}" class="btn btn-primary col-md-8 col-md-offset-2"><h2>Tambah Bahan</h2>
		</a>
	</div>		
@endsection