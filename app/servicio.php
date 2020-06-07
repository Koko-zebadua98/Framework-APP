<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{

    protected $fillable = [
      'nombre', 'img1', 'img2', 'img3', 'costo', 'monto_mora', 'version'
    ];

    public function subscrito(){
        return $this->belongsTo('App\subscripcion');
    }

    protected $primaryKey = 'id';
}

