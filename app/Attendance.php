<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'password',
        'description',
        'status',
        'user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'call_services', 'call', 'service');
    }


    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
}
