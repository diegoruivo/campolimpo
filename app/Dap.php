<?php

namespace CampoLimpo;

use Illuminate\Database\Eloquent\Model;

class Dap extends Model
{
    protected $fillable = [
        'user',
        'dap_number',
        'county',
        'state',
        'validity',
        'category',
        'framework'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function setValidityAttribute($value)
    {
        $this->attributes['validity'] = $this->convertStringToDate($value);
    }

    public function getValidityAttribute($value)
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
