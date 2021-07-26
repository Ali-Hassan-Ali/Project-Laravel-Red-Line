<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gallery extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['title'];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title->ar' , 'like', "%$search%")
            ->orWhere('title->en', 'like', "%$search%");
        });

    }//end ofscopeWhenSearch

    protected $appends = ['gallery_path'];

    public function getGalleryPathAttribute()
    {
        return asset('uploads/gallery_image/' . $this->image);

    }//end of get image path

}//end of model
