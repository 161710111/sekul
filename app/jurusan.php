<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $fillable = array('nama','keterangan');
     public $timestamps =true;

         public function prestasi()
    {
    	return $this->belongsTo('App\prestasi','id_jurusan');
    }
}
