<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    protected $fillable = [
        'cover',
        'title',
        'description',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function document_category()
    {
        return $this->belongsTo(DocumentCategory::class, 'document', 'id');
    }

}
