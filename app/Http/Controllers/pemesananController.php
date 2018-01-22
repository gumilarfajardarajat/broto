<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Menu;
class pemesananController extends Controller
{
    //
	public function show(){
		$menu = Menu::all();
		return view('lihat',compact('menu'));
	}

    public function menu(){
    	return view('content.menu');
    }	

    public function appetizer(){
    	return view('content.appetizer');
    }

    public function makanan(){
    	$n = 1;
    	$menu = Menu::all();
    	return view('content.makanan',['menu'=>$menu,'n'=>$n]);
    }

    public function minuman(){
    	return view('content.minuman');
    }

    public function dessert(){
    	return view('content.dessert');
    }        

}
