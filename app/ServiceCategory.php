<?php

namespace CampoLimpo;

use CampoLimpo\Support\Cropper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceCategory extends Model
{
    protected $fillable = [
        'title',
        'cover',
        'description'
    ];

    public function getUrlCroppedAttribute()
    {
        return Storage::url(Cropper::thumb($this->path, 1366, 768));
    }
}
