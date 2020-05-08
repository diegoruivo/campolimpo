<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{

    protected $fillable = [
        'contract_price',
        'pay_day',
        'deadline',
        'start_date',
        'service',
        'user',
        'provider',
        'term',
        'status'
    ];


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

    public function order()
    {
        return $this->belongsTo(Order::class, 'order', 'id');
    }




    public function term()
    {
        return $this->belongsTo(Term::class, 'term', 'id');
    }



    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }


    public function setContractPriceAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['contract_price'] = null;
        } else {
            $this->attributes['contract_price'] = floatval($this->convertStringToDouble($value));
        }
    }

    public function getContractPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }


    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $this->convertStringToDate($value);
    }

    public function getStartDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }


    private function convertStringToDouble(?string $param)
    {
        if (empty($param)) {
            return '';
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }

    private function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return '';
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }

    private function clearField(?string $param)
    {
        if (empty($param)) {
            return '';
        }
        return str_replace(['.','-','/',',',' ','(', ')'], '', $param);
    }

}
