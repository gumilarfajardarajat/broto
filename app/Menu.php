<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    
    protected $table = 'menu';

    protected $fillable = [
    	'kode_menu',
    	'nama_menu',
    	'keterangan',
    	'status',
    	'gambar',
    	'harga',
    	'kategori'
    ];

    protected $primaryKey = 'kode_menu';
}
