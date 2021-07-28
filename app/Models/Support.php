<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $guarded = [];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title->ar' , 'like', "%$search%")
            ->orWhere('title->en', 'like', "%$search%");
        });

    }//end ofscopeWhenSearch

}///end pf model
