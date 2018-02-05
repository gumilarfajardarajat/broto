<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;

class KasirController extends Controller
{
    public function indexPembayaran(){
        
        $pembayaran = DB::table('users')
        		->join('pelanggan','pelanggan.id','=','users.id')
                ->join('pembayaran','pembayaran.no_pelanggan','=','pelanggan.no_pelanggan')
                ->join('menu','menu.kode_menu','=','pembayaran.kode_menu')
                ->select('users.keterangan','pembayaran.no_pelanggan','pelanggan.nama_pelanggan','pelanggan.status',DB::raw('sum(harga) as total'))
                ->groupBy('pelanggan.no_pelanggan')
                ->where([
                		['pelanggan.aktivitas','checkout'],
                		['pelanggan.status','belum bayar']
                		])
                ->get();     	


    	return view('kasir.indexPembayaran',['pembayaran'=>$pembayaran]);
    }

    public function bayar($no_pelanggan){
        $pelanggan = Pelanggan::find($no_pelanggan);
        $pelanggan->status = 'sudah bayar';   	
        $pelanggan->save();
    	return redirect('/kasir/pembayaran');
    }

    public function indexPendapatan(){
        
        $pendapatan = DB::table('users')
        		->join('pelanggan','pelanggan.id','=','users.id')
                ->join('pembayaran','pembayaran.no_pelanggan','=','pelanggan.no_pelanggan')
                ->join('menu','menu.kode_menu','=','pembayaran.kode_menu')
                ->select('users.keterangan','pembayaran.no_pelanggan','pelanggan.nama_pelanggan','pelanggan.status',DB::raw('sum(harga) as total'))
                ->groupBy('pelanggan.no_pelanggan')
                ->where([
                		['pelanggan.aktivitas','checkout'],
                		['pelanggan.status','sudah bayar']
                		])
                ->get();

        $jumlah = DB::table('users')
        		->join('pelanggan','pelanggan.id','=','users.id')
                ->join('pembayaran','pembayaran.no_pelanggan','=','pelanggan.no_pelanggan')
                ->join('menu','menu.kode_menu','=','pembayaran.kode_menu')
                ->select(DB::raw('sum(harga) as total'))
                ->where([
                		['pelanggan.aktivitas','checkout'],
                		['pelanggan.status','sudah bayar']
                		])
                ->get();
        
       

    	return view('kasir.indexPendapatan',['pendapatan'=>$pendapatan,'jumlah'=>$jumlah]);
    }    

}
