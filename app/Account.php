<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user',
        'bank',
        'owner',
        'agency',
        'agency_dv',
        'account',
        'account_dv',
        'assignor_count',
        'assignor_count_dv',
        'wallet'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank', 'id');
    }
}