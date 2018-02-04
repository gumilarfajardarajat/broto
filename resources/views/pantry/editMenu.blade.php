@extends('layouts.pantry')

@section('title','Menu')

@section('content')
	<div class="container">
	<div class="content" style="padding:20px 60px; background-color: white;">
		<form action="/pantry/menu/{{$menu->kode_menu}}" method="post" style="padding: 50px 80px 0" enctype="multipart/form-data">
		  	<div class="form-group">
			  	<label for="email">Kode Menu :</label>		
				<input type="text" class="form-control" name="kode_menu" maxlength="4" style="height:50px;" value="{{$menu->kode_menu}}" readonly>
			</div>
			<div class="form-group">
				<label for="email">Nama Menu :</label>
				<input type="text"  class="form-control" name="nama_menu" maxlength="22" style="height:50px;" value="{{$menu->nama_menu}}">
			</div>
			<div class="form-group">
				<label for="email">Keterangan :</label>
				<textarea class="form-control" rows="5" id="comment" name="keterangan">{{$menu->keterangan}}</textarea>
			</div>
			<div class="form-group">
				<label for="email">Status :</label>
				<div class="radio">
					<label><input type="radio" name="status" value='tersedia' @if($menu->status == 'tersedia') checked @endif> Tersedia</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="status" value='habis' @if($menu->status == 'habis') checked @endif>Habis</label>
				</div>
			</div>	
			<div class="form-group">
				<label for="email">Gambar :</label>	
				<img src="/img/menu/{{$menu->gambar}}" style="width:200px;">
				<input type="file" name="file" id="file">
			</div>				
			<div class="form-group">
				<label for="email">Harga :</label>
				<input type="text"  class="form-control" name="harga" style="height:50px;" value="{{$menu->harga}}">
			</div>
			<div class="form-group">
				<label for="email">Kategori :</label>
				<div class="radio">
					<label><input type="radio" name="kategori" value='appetizer' @if($menu->kategori == 'appetizer') checked @endif> Appetizer</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="kategori" value='makanan' @if($menu->kategori == 'makanan') checked @endif>Makanan</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="kategori" value='minuman' @if($menu->kategori == 'minuman') checked @endif> Minuman</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="kategori" value='dessert' @if($menu->kategori == 'dessert') checked @endif>Dessert</label>
				</div>				
			</div>
			<input type="submit" value="Simpan" style="background-color:#935D2E; border-style: none; width: 100%; color:white; height: 50px;">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PUT">	
		</form>
	</div>
	</div>
@endsection