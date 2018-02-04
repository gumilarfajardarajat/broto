<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    
    protected $table = 'bahan';

    protected $fillable = [
    	'kode_bahan',
    	'nama_bahan',
    	'stok',
    	'satuan'
    ];

    protected $primaryKey = 'kode_bahan';
}
