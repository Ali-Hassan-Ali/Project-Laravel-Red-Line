<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);

    }//end of user

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order');

    }//end of products

}//end of model
