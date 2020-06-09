<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'price',
        'cost',
        'description',
        'service',
        'sector',
        'icon',
        'term',
        'cover',
        'contract'
    ];

    public const RELATIONSHIP_SERVICE_CALL = 'call_services';

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service', 'id');
    }

    public function call_services()
    {
        return $this->belongsTo(CallService::class, 'service', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, self::RELATIONSHIP_SERVICE_CALL, 'call', 'service');
    }

    public function sectors()
    {
        return $this->belongsToMany(CallSector::class, 'services_call_sectors', 'service', 'sector');
    }

    public function documents_categories()
    {
        return $this->belongsToMany(DocumentCategory::class, 'service_documents', 'service', 'document_category');
    }


    public function contracts()
    {
        return $this->hasMany(Contract::class, 'service', 'id');
    }

    public function terms()
    {
        return $this->belongsTo(Term::class, 'term', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'order', 'id');
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



    public function setCostAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['cost'] = null;
        } else {
            $this->attributes['cost'] = floatval($this->convertStringToDouble($value));
        }
    }

    public function getCostAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setContractAttribute($value)
    {
        $this->attributes['contract'] = ($value === true || $value === 'on' ? 1 : 0);
    }


    private function convertStringToDouble(?string $param)
    {
        if (empty($param)) {
            return '';
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }



}
