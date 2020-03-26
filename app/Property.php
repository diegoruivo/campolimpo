<?php

namespace CampoLimpo;

use CampoLimpo\Support\Cropper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    protected $fillable = [
        'category',
        'type',
        'user',
        'sale_price',
        'description',
        'area_total',
        'area_util',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property', 'id')->orderBy('cover', 'ASC');
    }

    public function cover()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path']);

        if (!$cover){
            $images = $this->images();
            $cover = $images->first(['path']);
        }

        if (empty($cover['path']) || !File::exists('../public/storage/' . $cover['path'])) {
            return url(asset('backend/assets/images/realty.jpeg'));
        }

        return Storage::url(Cropper::thumb($cover['path'], 1366, 768));
    }



    public function setSalePriceAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['sale_price'] = null;
        } else {
            $this->attributes['sale_price'] = floatval($this->convertStringToDouble($value));
        }
    }

    public function getSalePriceAttribute($value)
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
