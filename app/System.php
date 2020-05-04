<?php

namespace CampoLimpo;

use CampoLimpo\Support\Cropper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class System extends Model
{
    protected $fillable = [
        'title',
        'description',
        'keywords',
        'logo',
        'favico',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'telephone',
        'cell',
        'email',
        'site',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'map'
    ];


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
    }


    public function getUrlLogoAttribute()
    {
        if (!empty($this->logo)){
            return Storage::url(Cropper::thumb($this->logo, 400, 110));
        }
        return '';
    }

    public function getUrlFavicoAttribute()
    {
        if (!empty($this->favico)){
            return Storage::url(Cropper::thumb($this->favico, 100, 100));
        }
        return '';
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
