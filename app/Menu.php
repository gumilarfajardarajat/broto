<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    
    protected $table = 'menu';
}
