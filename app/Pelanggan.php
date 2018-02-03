<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    
    protected $table = 'pelanggan';

    protected $fillable = [
    	'id',
    	'no_pelanggan',
    	'nama_pelanggan',
    ];

    protected $primaryKey = 'no_pelanggan';
}
