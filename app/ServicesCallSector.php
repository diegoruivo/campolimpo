<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class ServicesCallSector extends Model
{
    protected $fillable = [
        'sector',
        'service'
    ];

    public function sectors()
    {
        return $this->hasMany(CallSector::class, 'sector', 'id');
    }
}
