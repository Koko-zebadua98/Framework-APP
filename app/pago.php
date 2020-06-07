<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    protected $fillable = [
        'id', 'id_subscripcion', 'se_pago', 'monto'
    ];
}
