<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = "units";
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];
}
