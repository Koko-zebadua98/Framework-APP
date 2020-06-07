<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscripciones extends Model
{
    protected $fillable = [
        'sub_fecha', 'renovacion', 'id_usuario', 'cancelar'
    ];
}
