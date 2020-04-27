<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class CallService extends Model
{
    protected $fillable = [
        'call',
        'service'
    ];


    public function services()
    {
        return $this->hasMany(Service::class, 'service', 'id');
    }
}
