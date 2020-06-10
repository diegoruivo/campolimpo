<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class AttendanceService extends Model
{
    protected $fillable = [
        'attendance',
        'service'
    ];


    public function services()
    {
        return $this->hasMany(Service::class, 'service', 'id');
    }
}
