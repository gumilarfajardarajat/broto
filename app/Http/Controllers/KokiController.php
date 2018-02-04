<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Menu;
use App\Bahan;
class KokiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:koki');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $query = DB::table('pemesanan')
        //              ->groupBy('jumlah')
        //              ->get();
        // dd($query);

        $orderan = DB::table('users')
                ->join('pelanggan','pelanggan.id','=','users.id')
                ->join('pemesanan','pemesanan.no_pelanggan','=','pelanggan.no_pelanggan')
                ->select('*',DB::raw('sum(jumlah) as jumlah'))
                ->groupBy('antrian')
                ->get(); 
                    

        // $orderan = DB::table('users')
        //         ->join('pelanggan','pelanggan.id','=','users.id')
        //         ->join('pemesanan','pemesanan.no_pelanggan','=','pelanggan.no_pelanggan')
        //         ->select(DB::raw('count(*) as user_count,users.id'))
        //         ->groupBy('waktu_pesan')
        //         ->get(); 
        //         dd($orderan);                   

        // $orderan = count(DB::table('pemesanan')
        //         ->select(DB::raw('antrian'))
        //         ->groupBy('antrian')
        //         ->get()
        //     ); 
        
                   
        return view('koki.index',['orderan'=>$orderan]);
    }

    public function pengiriman($antrian,$jumlah){
        $this->antrian = $antrian;
        $profil = DB::table('users')
                ->join('pelanggan','pelanggan.id','=','users.id')
                ->join('pemesanan','pemesanan.no_pelanggan','=','pelanggan.no_pelanggan')
                ->where('antrian', $antrian)
                ->limit(1)
                ->get();  

        $orderan = DB::table('users')
                ->join('pelanggan','pelanggan.id','=','users.id')
                ->join('pemesanan','pemesanan.no_pelanggan','=','pelanggan.no_pelanggan')
                ->join('menu','menu.kode_menu','=','pemesanan.kode_menu')
                ->where('antrian', $antrian)
                ->get();        
        // $orderan = DB::table('pemesanan')->where('antrian', $antrian)->get();
        
        return view('koki.pengiriman',['orderan'=>$orderan,'profil'=>$profil,'antrian'=>$antrian,'jumlah'=>$jumlah]);
    }

    public function kirim($antrian){
        DB::table('pemesanan')->where('antrian',$antrian)->delete();
        return redirect('/koki');
    }

    public function indexResep(){
        $menu = Menu::all();
        return view('koki.indexResep',['menu'=>$menu]);
    }

    public function addBahan($kode_menu){
        $menu = Menu::find($kode_menu);
        $bahan = Bahan::all();
        return view('koki.addBahan',['menu'=>$menu,'bahan'=>$bahan]);
    }

    public function storeBahan(Request $request,$kode_menu){
        $validatedData = $request->validate([
            'takaran' => 'required',          
        ]);

        $kode_bahan = $request->kode_bahan;
        $takaran = $request->takaran;


        $cek = count(
                                DB::table('pembuatan')
                                ->where([
                                    ['kode_bahan',$kode_bahan],
                                    ['kode_menu',$kode_menu],
                                ])
                                ->get()
                        );
                             
      

       if($cek==0){
            DB::table('pembuatan')->insert(
                [
                    'kode_menu' => $kode_menu,
                    'kode_bahan' => $kode_bahan,
                    'takaran' => $takaran,               
                    
                ]
            );

            return redirect('/koki/resep/');            
       }else{

            return redirect()->back()->with('message', 'Bahan sudah ada');
       }


    }

    public function showBahan($kode_menu){
        $bahan = DB::table('pembuatan')
                    ->join('pelanggan','pelanggan.id','=','users.id')            
                    ->where('kode_menu',$kode_menu)
                    ->get();
        return view('koki.showBahan');
      }
}
