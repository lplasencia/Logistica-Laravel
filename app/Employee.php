<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    public $timestamps = false;

    protected $fillable = [
        'nombre','dni', 'direccion', 'telefono','email','fecha_nac'
    ];
}
