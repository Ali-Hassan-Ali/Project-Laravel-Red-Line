<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    protected $guarded = [];
    
    public $translatable = ['name','description'];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name->ar' , 'like', "%$search%")
            ->orWhere('name->en', 'like', "%$search%")
            ->orWhere('description->ar', 'like', "%$search%")
            ->orWhere('description->en', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch

    public function category()
    {
        return $this->belongsTo(Categorey::class,'category_id');
    }//end of belongsTo category

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/product_image/' . $this->image);

    }//end of get image path

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'product_id');

    }//end of hasMany purchase

}//end of model
