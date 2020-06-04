<?php

namespace CampoLimpo;

use CampoLimpo\Support\Cropper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Web extends Model
{
    public function getUrlCoverAttribute()
    {
        if (!empty($this->cover)){
            return Storage::url(Cropper::thumb($this->cover, 500, 500));
        }
        return '';
    }


    public function content()
    {
        return $this->belongsTo(PageContent::class, 'content', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryPost::class, 'category', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service', 'id');
    }

    public function images()
    {
        return $this->hasMany(ContentImage::class, 'content', 'id')->orderBy('cover', 'ASC');
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

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }



}
