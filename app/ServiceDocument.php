<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class ServiceDocument extends Model
{
    protected $fillable = [
        'document_category',
        'service'
    ];

    public function documents_categories()
    {
        return $this->hasMany(ServiceCategory::class, 'document_category', 'id');
    }
}
