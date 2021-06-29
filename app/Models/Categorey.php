<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Categorey extends Model
{
    use HasTranslations;
    
    public $translatable = ['name'];

    public $guarded = [];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name->ar' , 'like', "%$search%")
            ->orWhere('name->en', 'like', "%$search%");
            // ->orWhere('phone', 'like', "%$search%");
        });
    }//end ofscopeWhenSearch
    
}//end of model
