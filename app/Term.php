<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];
}
