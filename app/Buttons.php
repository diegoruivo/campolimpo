<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Buttons extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'url',
        'position',
    ];

}
