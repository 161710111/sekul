<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eskul extends Model
{
     protected $fillable = array('nama','keterangan');
     public $timestamps =true;

         public function prestasi()
    {
    	return $this->hasMany('App\prestasi','id_eskul');
    }
}
