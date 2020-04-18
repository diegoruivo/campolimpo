<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class RuralEnvironmentalRegistry extends Model
{
    protected $fillable = [
        'user',
        'car_number',
        'property_name',
        'county',
        'uf',
        'register_date',
        'property_code_mma'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function setRegisterDateAttribute($value)
    {
        $this->attributes['register_date'] = $this->convertStringToDate($value);
    }

    public function getRegisterDateAttribute($value)
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
