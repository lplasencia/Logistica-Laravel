<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = "times";
    public $timestamps = false;

    protected $fillable = [
        'descripcion','inicial','final','resultado'
    ];
}
