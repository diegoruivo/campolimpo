<?php

namespace CampoLimpo;

use CampoLimpo\Support\Cropper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PageContent extends Model
{
    protected $fillable = [
        'page',
        'title',
        'subtitle',
        'description',
        'slug',
        'position',
        'status'
    ];


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
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

}
