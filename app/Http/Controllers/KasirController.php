<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function indexPembayaran(){
    	return view('kasir.indexPembayaran');
    }
}
