<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'password',
        'description',
        'user',
        'service',
        'sector'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service', 'id');
    }

    public function sector()
    {
        return $this->belongsTo(CallSector::class, 'sector', 'id');
    }

}
