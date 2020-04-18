<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class RuralProperty extends Model
{
    protected $fillable = [
        'user',
        'nirf_number',
        'ccir_number',
        'rural_property',
        'area',
        'domain_type',
        'domain_document'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

}
