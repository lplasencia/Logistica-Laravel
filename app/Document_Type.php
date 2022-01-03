<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_Type extends Model
{
    protected $table = "document_types";
    public $timestamps = false;

    protected $fillable = [
        'nombre','operacion'
    ];
}
