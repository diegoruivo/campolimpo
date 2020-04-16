<?php

namespace CampoLimpo;

use CampoLimpo\Support\Cropper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bank extends Model
{
    protected $fillable = [
        'bank',
        'logo',
        'bank_dv'
    ];

    public function getUrlLogoAttribute()
    {
        if (!empty($this->logo)){
            return Storage::url(Cropper::thumb($this->logo, 500, 500));
        }
        return '';
    }
}
