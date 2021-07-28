<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    protected $appends = ['payment_path'];

    public function getPaymentPathAttribute()
    {
        return asset('uploads/payment_image/' . $this->image);

    }//end of get image path

}//end of paymint
