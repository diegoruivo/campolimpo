<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class CallSector extends Model
{
    protected $fillable = [
        'title'
    ];


    public function users()
    {
        return $this->belongsToMany(CallSector::class, 'user_call_sectors', 'sector', 'user');

    }


}
