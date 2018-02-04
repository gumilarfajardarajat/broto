@extends('layouts.pantry')

@section('title','Menu')

@section('content')
		<form action="/pantry/bahan/{{$bahan->kode_bahan}}" method="post" style="padding: 50px 80px 0" enctype="multipart/form-data">
		  	<div class="form-group">
			  	<label for="email">Kode Bahan :</label>		
				<input type="text" class="form-control" name="kode_bahan" maxlength="4" style="height:50px;" value="{{$bahan->kode_bahan}}" readonly>			
			</div>
			<div class="form-group">
				<label for="email">Nama Bahan :</label>
				<input type="text"  class="form-control" name="nama_bahan" maxlength="22" style="height:50px;" value="{{$bahan->nama_bahan}}">
			</div>
				@if($errors->has('nama_bahan'))
					<p style="color:#cc0000">{{ $errors->first('nama_bahan')}}</p>
				@endif			
			<div class="form-group">
				<label for="email">Stok :</label>
				<input type="number" class="form-control" name="stok" value="{{$bahan->stok}}">
			</div>
				@if($errors->has('stok'))
					<p style="color:#cc0000">{{ $errors->first('stok')}}</p>
				@endif			
			<div class="form-group">
				<label for="email">Satuan :</label>
				<input type="text"  class="form-control" name="satuan" maxlength="22" style="height:50px;" value="{{$bahan->satuan}}">
			</div>
				@if($errors->has('stok'))
					<p style="color:#cc0000">{{ $errors->first('stok')}}</p>
				@endif			
			<input type="submit" value="Simpan" style="background-color:#935D2E; border-style: none; width: 100%; color:white; height: 50px;">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PUT">	
		</form>
@endsection