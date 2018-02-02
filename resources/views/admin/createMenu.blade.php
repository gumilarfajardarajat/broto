@extends('admin')

@section('title','Menu')

@section('content')
		<form action="/admin/menu" method="post" style="padding: 50px 80px 0" enctype="multipart/form-data">
		  	<div class="form-group">
			  	<label for="email">Kode Menu :</label>		
				<input type="text" class="form-control" name="kode_menu" maxlength="4" style="height:50px; ">
				@if($errors->has('kode_menu'))
					<p style="color:#cc0000">{{ $errors->first('kode_menu')}}</p>
				@endif
			</div>
			<div class="form-group">
				<label for="email">Nama Menu :</label>
				<input type="text"  class="form-control" name="nama_menu" maxlength="4" style="height:50px;">
				@if($errors->has('nama_menu'))
					<p style="color:#cc0000">{{ $errors->first('nama_menu')}}</p>
				@endif				
			</div>
			<div class="form-group">
				<label for="email">Keterangan :</label>
				<textarea class="form-control" rows="5" id="comment" name="keterangan"></textarea>
				@if($errors->has('keterangan'))
					<p style="color:#cc0000">{{ $errors->first('keterangan')}}</p>
				@endif				
			</div>
			<div class="form-group">
				<label for="email">Status :</label>
				<div class="radio">
					<label><input type="radio" name="status" value='tersedia' >Tersedia</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="status" value='habis' >Habis</label>
				</div>
				@if($errors->has('status'))
					<p style="color:#cc0000">{{ $errors->first('status')}}</p>
				@endif				
			</div>	
			<div class="form-group">
				<label for="email">Gambar :</label>	
				<input type="file" name="file" id="file">
				@if($errors->has('file'))
					<p style="color:#cc0000">{{ $errors->first('file')}}</p>
				@endif	
			</div>
						
			<div class="form-group">
				<label for="email">Harga :</label>
				<input type="number"  class="form-control" name="harga" style="height:50px;">
				@if($errors->has('file'))
					<p style="color:#cc0000">{{ $errors->first('file')}}</p>
				@endif				
			</div>

			<div class="form-group">
				<label for="email">Kategori :</label>
				<div class="radio">
					<label><input type="radio" name="kategori" value='appetizer'> Appetizer</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="kategori" value='makanan'>Makanan</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="kategori" value='minuman'> Minuman</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="kategori" value='dessert'>Dessert</label>
				</div>
				@if($errors->has('kategori'))
					<p style="color:#cc0000">{{ $errors->first('kategori')}}</p>
				@endif								
			</div>
			<input type="submit" value="Simpan" style="background-color:#935D2E; border-style: none; width: 100%; color:white; height: 50px;">
			{{csrf_field()}}	
		</form>
@endsection