<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'price',
        'description',
        'service',
        'sector',
        'icon',
        'cover'
    ];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service', 'id');
    }

    public function sectors()
    {
        return $this->belongsToMany(CallSector::class, 'services_call_sectors', 'service', 'sector');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function setPriceAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['price'] = null;
        } else {
            $this->attributes['price'] = floatval($this->convertStringToDouble($value));
        }
    }

    public function getPriceAttribute($value)
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
