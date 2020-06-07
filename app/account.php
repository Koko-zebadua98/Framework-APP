<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $fillable = [
        'id', 'id_user', 'targeta', 'saldo'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
