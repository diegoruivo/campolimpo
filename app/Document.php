<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    protected $fillable = [
        'title',
        'path',
        'description',
        'document',
        'user',
        'property'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function document_category()
    {
        return $this->belongsTo(DocumentCategory::class, 'document', 'id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property', 'id');
    }

}
