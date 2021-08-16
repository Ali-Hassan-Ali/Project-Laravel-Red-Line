<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }//end of Product

    function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }//end of hasMay order

}//end of model
