<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bahan;
use App\Menu;
use App\Pelanggan;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class PantryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:pantry');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBahan()
    {
        $bahan = DB::table('bahan')->get();
        return view('pantry.indexBahan',['bahan'=>$bahan]);
    }

    public function createBahan(){
        return view('pantry.createBahan');
    }

    public function storeBahan(Request $request){
        $validatedData = $request->validate([
            'kode_bahan' => 'required|unique:bahan|max:4',
            'nama_bahan' => 'required|max:22',
            'stok' => 'required',
            'satuan' => 'required',          
        ]);        

        $bahan = new Bahan;
        $bahan->kode_bahan = $request->kode_bahan;
        $bahan->nama_bahan = $request->nama_bahan;
        $bahan->stok = $request->stok;
        $bahan->satuan = $request->satuan;
        $bahan->save();
        return redirect('/pantry/bahan');
    } 


    public function editBahan($kode_bahan){
        $bahan = Bahan::find($kode_bahan);
        return view('pantry.editBahan',['bahan'=>$bahan]);     
    } 

    public function updateBahan(Request $request, $kode_bahan){
        $validatedData = $request->validate([
            'nama_bahan' => 'required|max:22',
            'stok' => 'required',
            'satuan' => 'required',          
        ]);         

        $bahan = Bahan::find($kode_bahan);
        $bahan->nama_bahan = $request->nama_bahan;
        $bahan->stok = $request->stok;
        $bahan->satuan = $request->satuan;
        $bahan->save();
        return redirect('/pantry/bahan');
    } 

    public function destroybahan($kode_bahan){
        $bahan = Bahan::find($kode_bahan);
        $bahan->delete();
        return redirect('/pantry/bahan');
    }

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
        
                   
        return view('pantry.index',['orderan'=>$orderan]);
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
        
        return view('pantry.pengiriman',['orderan'=>$orderan,'profil'=>$profil,'antrian'=>$antrian,'jumlah'=>$jumlah]);
    }   

    public function kirim($antrian){
        DB::table('pemesanan')->where('antrian',$antrian)->delete();
        return redirect('/pantry/pemesanan');
    }



    public function indexResep(){
        $menu = Menu::all();
        return view('pantry.indexResep',['menu'=>$menu]);
    }         

    public function addBahan($kode_menu){
        $menu = Menu::find($kode_menu);
        $bahan = Bahan::all();
        return view('pantry.addBahan',['menu'=>$menu,'bahan'=>$bahan]);
    }

    public function storeBahanResep(Request $request,$kode_menu){
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

            return redirect('/pantry/resep/');            
       }else{

            return redirect()->back()->with('message', 'Bahan sudah ada');
       }


    }

    public function showBahan($kode_menu){
        $menu = Menu::find($kode_menu);
        $bahan = DB::table('menu')
                ->join('pembuatan','pembuatan.kode_menu','=','menu.kode_menu')
                ->join('bahan','bahan.kode_bahan','=','pembuatan.kode_bahan')
                ->where('menu.kode_menu', $kode_menu)
                ->get();
        return view('pantry.showBahan',['bahan'=>$bahan,'menu'=>$menu]);
      }

    public function destroyResepBahan($kode_bahan,$kode_menu){
        DB::table('pembuatan')
        ->where([
            ['kode_menu',$kode_menu],
            ['kode_bahan',$kode_bahan]
        ])
        ->delete();
        return redirect('/pantry/resep');
    }      


//Menu
    public function indexMenu(){
        $menu = Menu::all();
        return view('pantry.indexMenu',['menu'=>$menu]);
    }

    public function createMenu(){
        return view('pantry.createMenu');
    
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
        return redirect('pantry/menu');  
    }

    public function showMenu(){
        
    }

    public function editMenu($kode_menu){
        
        $menu = Menu::find($kode_menu);
        return view('pantry.editMenu',['menu'=>$menu]);
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
        return redirect('pantry/menu');
    }


    public function destroyMenu($kode_menu){
        $menu = Menu::find($kode_menu);
        $menu->delete();
        return redirect('pantry/menu');
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
