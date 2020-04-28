<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class UsersCallSector extends Model
{
    protected $fillable = [
        'sector',
        'user'
    ];

    public function sectors()
    {
        return $this->hasMany(CallSector::class, 'sector', 'id');
    }
}
