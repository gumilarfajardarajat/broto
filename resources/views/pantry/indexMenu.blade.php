@extends('layouts.pantry')

@section('title','Menu')

@section('content')
	<div class="container">
	<div class="content" style="padding:20px 60px; background-color: white;">
	<a href="/pantry/menu/create" class="btn btn-primary "><span class="glyphicon glyphicon-plus"></span> Tambah</a>
	<table class="table" style="background-color: white;">
		<thead>
			<tr>
				<th>Kode Menu</th>
				<th>Nama Menu</th>
				<th>Keterangan</th>
				<th>Status</th>
				<th>Gambar</th>
				<th>Harga</th>
				<th>Kategori</th>
				<th colspan="2">Aksi</th>
			</tr>
		</thead>
		<tbody>	
			@foreach($menu as $m)
			<tr>
				<td>{{$m->kode_menu}}</td>
				<td>{{$m->nama_menu}}</td>
				<td>{{ substr($m->keterangan,0,200) }}</td>
				<td>{{$m->status}}</td>
				<td>{{$m->gambar}}</td>
				<td>{{$m->harga}}</td>
				<td>{{$m->kategori}}</td>
				<td>
					<a href="/pantry/menu/{{$m->kode_menu}}" class="btn btn-info btn-md">
					    <span class="glyphicon glyphicon-pencil"></span> Edit 
					</a>
				</td>
				<td>
			        <form action="/pantry/menu/{{$m->kode_menu}}" method="post">
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