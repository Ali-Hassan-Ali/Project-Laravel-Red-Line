<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Categorey extends Model
{
    use HasTranslations;

    protected $guarded = [];
    
    public $translatable = ['name'];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name->ar' , 'like', "%$search%")
            ->orWhere('name->en', 'like', "%$search%");
            // ->orWhere('phone', 'like', "%$search%");
        });
        // ->when($request->category_id,function($q) use ($request) {

        //     return $q->where('category_id',$request->category_id);

        // });
    }//end ofscopeWhenSearch

    public function proudut()
    {
        return $this->hasMany(Product::class,'category_id');
    }//end of belongsTo category
    
}//end of model
