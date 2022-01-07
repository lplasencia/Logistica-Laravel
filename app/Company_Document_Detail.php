<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_Document_Detail extends Model
{
    protected $table = "company_document_details";
    public $timestamps = false;

    protected $fillable = [
        'ultima_serie','ultimo_numero', 'document_type_id', 'company_id'
    ];

    public function document_type()
    {
        return $this->belongsTo(Document_Type::class);
    }
}
