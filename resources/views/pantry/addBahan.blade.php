@extends('layouts.pantry')

@section('title','Menu')

@section('content')
		<form action="/koki/resep/{{$menu->kode_menu}}" method="post" style="padding: 50px 80px 0" enctype="multipart/form-data">
		  	<div class="form-group">
			  	<label for="email">Kode Menu :</label>		
					<input type="text" class="form-control" name="kode_menu" maxlength="4" style="height:50px;" value="{{$menu->kode_menu}}" readonly>
			</div>
		  	<div class="form-group">
			  	<label for="email">Name Menu :</label>		
					<input type="text" class="form-control" name="nama_menu" maxlength="4" style="height:50px;" value="{{$menu->nama_menu}}" readonly>
			</div>

			<div class="form-group">
				<label for="sel1">Select list:</label>
				<select class="form-control" id="sel1" name="kode_bahan">
					@foreach($bahan as $b)
						<option value="{{$b->kode_bahan}}">{{$b->nama_bahan}}</option>
					@endforeach
				</select>
				@if(session()->has('message'))
				    <div class="alert alert-success">
				        {{ session()->get('message') }}
				    </div>
				@endif				
			</div>	

		  	<div class="form-group">
			  	<label for="email">Takaran :</label>		
					<input type="numer" class="form-control" name="takaran" maxlength="4" style="height:50px;">
				@if($errors->has('takaran'))
					<p style="color:#cc0000">{{ $errors->first('takaran')}}</p>
				@endif						
			</div>					

			<input type="submit" value="Simpan" style="background-color:#935D2E; border-style: none; width: 100%; color:white; height: 50px;">
			{{csrf_field()}}
		</form>
@endsection