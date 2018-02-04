@extends('layouts.pantry')
@section('title','index')

@section('content')
	<div class="container">
		<h1 class="text-center">Bahan</h1>
		<div class="content" style="padding:20px 80px; background-color: white;">
					<a href="/pantry/bahan/create" class="btn btn-primary "><span class="glyphicon glyphicon-plus"></span> Tambah</a>
			<table class="table" style="background-color: white;">
				<thead>
					<tr class="child">
						<th>Kode Bahan</th>
						<th>Nama Bahan</th>
						<th>Stock</th>
						<th>Satuan</th>
						<th colspan="2" style="text-align: center">Aksi</th>
						
					</tr>		
				</thead>
				<tbody>
					@foreach($bahan as $b)
						<tr>
							<td>{{$b->kode_bahan}}</td>
							<td>{{$b->nama_bahan}}</td>
							<td>{{$b->stok}}</td>
							<td>{{$b->satuan}}</td>
							<td style="text-align: right;">
								<a href="/pantry/bahan/{{$b->kode_bahan}}" class="btn btn-info btn-md">
								    <span class="glyphicon glyphicon-pencil"></span> Edit 
								</a>
							</td>
							<td style="text-align: center">
						        <form action="/pantry/bahan/{{$b->kode_bahan}}" method="post">
							        <button type="submit" name="submit" class="btn btn-danger btn-md">
							        	<span class="glyphicon glyphicon-trash"></span> Delete
							        </button>
									<input type="hidden" name="_method" value="DELETE">
									{{csrf_field()}}				         			        
						    	</form>
							</td>
						</tr>
					@endforeach		
				</tbody>				
			</table>
		</div>
	</div>
@endsection