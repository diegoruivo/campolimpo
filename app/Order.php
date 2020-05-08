<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'contract',
        'user',
        'provider',
        'description',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'status'
    ];


    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service', 'id');
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider', 'id');
    }




    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $this->convertStringToDate($value);
    }

    public function getStartDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $this->convertStringToDate($value);
    }

    public function getEndDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }


    private function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return '';
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }

}
