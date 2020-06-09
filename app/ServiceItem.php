<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    protected $fillable = [
        'title',
        'service',
        'cost'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'service', 'id');
    }

    public function setCostAttribute($value)
    {
        $this->attributes['cost'] = floatval($this->convertStringToDouble($value));
    }

    public function getCostAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }


    private function convertStringToDouble(?string $param)
    {
        if (empty($param)) {
            return '';
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }


}