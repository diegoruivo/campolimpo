<?php

namespace CampoLimpo;

use CampoLimpo\Support\Cropper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'small_rural_producer',
        'medium_rural_producer',
        'large_rural_producer',
        'name',
        'email',
        'password',
        'genre',
        'document',
        'document_secondary',
        'document_secondary_complement',
        'date_of_birth',
        'place_of_birth',
        'civil_status',
        'cover',
        'occupation',
        'income',
        'company_work',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'location_type',
        'telephone',
        'cell',
        'type_of_communion',
        'spouse_name',
        'spouse_genre',
        'spouse_document',
        'spouse_document_secondary',
        'spouse_document_secondary_complement',
        'spouse_date_of_birth',
        'spouse_place_of_birth',
        'spouse_occupation',
        'spouse_income',
        'spouse_company_work',
        'organized_group',
        'organized_group_type',
        'organized_group_name',
        'admin',
        'client',
        'provider',
        'clerk',
        'sector'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companies()
    {
       return $this->hasMany(Company::class, 'user', 'id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'user', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'user', 'id');
    }

    public function documents_categories()
    {
        return $this->hasMany(DocumentCategory::class, 'document', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'service', 'id');
    }



    public function getUrlCoverAttribute()
    {
        if (!empty($this->cover)){
            return Storage::url(Cropper::thumb($this->cover, 500, 500));
        }
        return '';
    }

    public function setSmallRuralProducerAttribute($value)
    {
        $this->attributes['small_rural_producer'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setMediumRuralProducerAttribute($value)
    {
        $this->attributes['medium_rural_producer'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setLargeRuralProducerAttribute($value)
    {
        $this->attributes['large_rural_producer'] = ($value === true || $value === 'on' ? 1 : 0);
    }


    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = $this->clearField($value);
    }

    public function getDocumentAttribute($value)
    {
        return substr($value, 0,3) . '.' . substr($value, 3,3) . '.' . substr($value, 6,3) . '-' . substr($value, 9,2);
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $this->convertStringToDate($value);
    }

    public function getDateOfBirthAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }


    public function setIncomeAttribute($value)
    {
        $this->attributes['income'] = floatval($this->convertStringToDouble($value));
    }

    public function getIncomeAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = $this->clearField($value);
    }

    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = $this->clearField($value);
    }

    public function setCellAttribute($value)
    {
        $this->attributes['cell'] = $this->clearField($value);
    }

    /**
    Ao editar qualquer campo do usuário, a senha também é alterada impossibilitando efetuar um novo login.
    Solução: Se o input for vazio, remove a posição da atualização com o unset.
     */
    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }

        $this->attributes['password'] = bcrypt($value);
    }

    public function setAdminAttribute($value)
    {
        $this->attributes['admin'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setClientAttribute($value)
    {
        $this->attributes['client'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setProviderAttribute($value)
    {
        $this->attributes['provider'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setClerkAttribute($value)
    {
        $this->attributes['clerk'] = ($value === true || $value === 'on' ? 1 : 0);
    }




    public function setSpouseDocumentAttribute($value)
    {
        $this->attributes['spouse_document'] = $this->clearField($value);
    }

    public function getSpouseDocumentAttribute($value)
    {
        return substr($value, 0,3) . '.' . substr($value, 3,3) . '.' . substr($value, 6,3) . '-' . substr($value, 9,2);
    }

    public function setSpouseDateOfBirthAttribute($value)
    {
        $this->attributes['spouse_date_of_birth'] = $this->convertStringToDate($value);
    }

    public function getSpouseDateOfBirthAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function setSpouseIncomeAttribute($value)
    {
        $this->attributes['spouse_income'] = floatval($this->convertStringToDouble($value));
    }

    public function getSpouseIncomeAttribute($value)
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
