<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';


    public function images()
    {
    	return $this->hasMany('App\Images', 'store_id', 'id');

    }
}
