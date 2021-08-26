<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\FixedDiscountCoupon;

class CouponController extends Controller
{
    public function store(Request $request)
    {
        
        try {

            if (request()->ajax()) {
                

                $coupon = Cupon::where('name', $request->coupon_code)->first();

                if ($coupon == null || $coupon->end <= date("Y-m-d")) {
              
                    return response()->json('error');
                }

                session()->put('coupon',$coupon->value);
              
                return response()->json(['success' => true]);

            }//end of ajax


        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    public function destroy()
    {
        try {

            if (request()->ajax()) {
                
                $coupon = session()->forget('coupon');

                return response()->json(['success' => true]);

            }//end of ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
