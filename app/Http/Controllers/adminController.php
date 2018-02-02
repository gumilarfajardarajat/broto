<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Menu;
use App\Pelanggan;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;	

class adminController extends Controller
{
    	
	//Menu

    public function indexMenu(){
    	$menu = Menu::all();
    	return view('admin.indexMenu',['menu'=>$menu]);
    }

    public function createMenu(){
    	return view('admin.createMenu');
    
    }

    public function storeMenu(Request $request){
	    
	    $validatedData = $request->validate([
	        'kode_menu' => 'required|unique:menu|max:4',
	        'nama_menu' => 'required|max:22',
	        'status' => 'required',
	        'harga' => 'required',
	        'kategori' => 'required',
			'file' => 'required',
			'harga' => 'required',	        
	    ]);

	    // $this->validate($request, [
	    //     'kode_menu' => 'required|unique:menu|max:4',
	    //     'nama_menu' => 'required',
	    //     'status' = > 'required',
	    // ]);  	        	


    	$menu = new Menu;
		$menu->kode_menu = $request->kode_menu;
		$menu->nama_menu = $request->nama_menu;
		$menu->keterangan = $request->keterangan;
		$menu->status = $request->status;

		if(Input::hasFile('file')){
			$file = Input::file('file');
			$file->move('img/menu', $file->getClientOriginalName());
			$menu->gambar = $file->getClientOriginalName();

		}

		$menu->harga = $request->harga;
		$menu->kategori = $request->kategori;
		$menu->save();    	
    	return redirect('admin/menu');	
    }

    public function showMenu(){
    	
    }

    public function editMenu($kode_menu){
    	
    	$menu = Menu::find($kode_menu);
    	return view('admin.editMenu',['menu'=>$menu]);
    }   

    public function updateMenu(Request $request, $kode_menu){
    	$menu = Menu::find($kode_menu);
		$menu->nama_menu = $request->nama_menu;
		$menu->keterangan = $request->keterangan;
		$menu->status = $request->status;

		if(Input::hasFile('file')){
			File::delete('img/menu/' . $menu->gambar);
			$file = Input::file('file');
			$file->move('img/menu', $file->getClientOriginalName());
			$menu->gambar = $file->getClientOriginalName();

		}

		$menu->harga = $request->harga;
		$menu->kategori = $request->kategori;
		$menu->save();    	
    	return redirect('admin/menu');
    }


    public function destroyMenu($kode_menu){
    	$menu = Menu::find($kode_menu);
    	$menu->delete();
    	return redirect('admin/menu');
    }

    public function form(){
    	return view('upload');
    }    

	public function upload(){

		if(Input::hasFile('file')){

			echo 'Uploaded';
			$file = Input::file('file');
			$file->move('img', $file->getClientOriginalName());
			$a = $file->getClientOriginalName();
			dd($a);
			echo '';
		}

	}             
}
