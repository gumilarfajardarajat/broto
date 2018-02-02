<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Menu;
use App\Pelanggan;
class pemesananController extends Controller
{
    //
    public $no_pelanggan;

	public function index(){
		$menu = Menu::all();
		return view('lihat',compact('menu'));
	}

    public function createPelanggan(){
        $no_pelanggan = DB::table('pelanggan')->count();
        $no_pelanggan = $no_pelanggan + 1; 
        return view('daftar',['no_pelanggan'=>$no_pelanggan]);
    }

    public function storePelanggan(Request $request){
        $pelanggan = new Pelanggan;
        $pelanggan->no_pelanggan = $request->no_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->save();
        $request->session()->put('no_pelanggan', $pelanggan->no_pelanggan);
        return redirect('pemesanan/home');
    }

    public function home(){
        return view('content.home');
    }   
       

    public function menu(){
        //dd(session()->get('no_pelanggan'));
    	return view('content.menu');
    }	




    public function kategori($kategori){
        $n = 1;
        
        $menu = Menu::all();    	
        return view('content.daftarmenu',['menu'=>$menu,'n'=>$n,'kategori'=>$kategori]);
    }



    public function show($kode_menu){
        $menu = Menu::find($kode_menu);
        return view('content.show',['menu'=>$menu]);
    }

    public function addCart(Request $request){
        $kode_menu = $request->kode_menu; 
        $jumlah = $request->jumlah; 
        DB::table('cart')->insert(
            [
                'no_pelanggan' => session()->get('no_pelanggan'), 
                'kode_menu' => $kode_menu,
                'jumlah' => $jumlah
            ]
        );
        return redirect('/pemesanan/menu');        
       
    }

    public function tampilCart(){
        $cart = DB::table('cart')
                ->join('menu','menu.kode_menu','=','cart.kode_menu')
                ->get();
        return view('content.cart',['cart'=>$cart]);        
       
    }

    public function kirimCart(){
        $cart = DB::table('cart')->delete();
        return redirect('/pemesanan/home');
    }

    public function keluar(){
        session()->flush();
        return redirect('/');
    }


}
