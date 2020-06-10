<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'password',
        'user',
        'provider',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'attendance_services', 'attendance', 'service');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }

}
