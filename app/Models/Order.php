<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/order_images/' . $this->image);

    }//end of get image path

    function purchase()
    {
        return $this->hasMany(Purchase::class,'order_id');
    }//end of hasMany Purchase

    function user()
    {
        return $this->hasMany(User::class,'user_id');
    }//end of hasMany user

    public function scopeWhenSearch($query , $search , $request) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name' , 'like', "%$search%")
            ->orWhere('map', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%")
            ->orWhere('total_price', 'like', "%$search%");

        })->when($request->status,function($q) use ($request) {

            return $q->where('status',$request->status);

        });

    }//end of scopeWhenSearch

}//end of model
