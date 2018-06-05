<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class industri extends Model
{
    protected $fillable = array('nama','keterangan');
     public $timestamps =true;

         public function jurusan()
    {
    	return $this->hasMany('App\jurusan','id_industri');
    }

}
