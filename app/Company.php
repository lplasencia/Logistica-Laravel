<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    public $timestamps = false;

    protected $fillable = [
        'razon_social','ruc', 'representante', 'direccion', 'telefono',
        'email'
    ];
}
