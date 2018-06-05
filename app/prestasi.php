<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    protected $fillable = array('nama','keterangan','id_eskul');

    public function eskul()
    {
    	return $this->hasMany('App\eskul','id_eskul');
    }
}
