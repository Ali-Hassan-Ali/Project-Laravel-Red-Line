<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use AmrShawky\LaravelCurrency\Facade\Currency;

class Product extends Model
{
    use HasTranslations;

    protected $guarded = [];
    
    public $translatable = ['name','description'];

    public function scopeWhenSearch($query , $search , $request) 
    {
        // dd($query);
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name->ar' , 'like', "%$search%")
            ->orWhere('name->en', 'like', "%$search%")
            ->orWhere('description->ar', 'like', "%$search%")
            ->orWhere('description->en', 'like', "%$search%");
            
        })->when($request->category_id,function($q) use ($request) {

            return $q->where('category_id',$request->category_id);

        });
        
    }//end of scopeWhenSearch

    public function category()
    {
        return $this->belongsTo(Categorey::class,'category_id');
    }//end of belongsTo category

    protected $appends = ['image_path','exchange_rate'];

    public function getImagePathAttribute()
    {
        return asset('uploads/product_image/' . $this->image);

    }//end of get image path

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'product_id');

    }//end of hasMany purchase

    public function getExchangeRateAttribute()
    {

        return $this->price * Currenc::latest()->first()->sdg;
        // return Currency::convert()
        //     ->from('USD')
        //     ->to('SDG')
        //     ->amount($this->price)
        //     ->get();

    }//end of get exchange rate attribute

}//end of model
