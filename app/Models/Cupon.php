<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $guarded = [];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name' , 'like', "%$search%")
            ->orWhere('value', 'like', "%$search%")
            ->orWhere('end', 'like', "%$search%");
        });
        
    }//end ofscopeWhenSearch

}//end fp  model
