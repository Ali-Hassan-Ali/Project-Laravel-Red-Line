<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('home.payment');

    }//end pf index

    public function create_order(Request $request, Product $product)
    {

        
        if (\Cart::count() < 0) {

            return redirect()->back()->with('no data');
            
        } else {

            // dd($request->all());
            foreach (\Cart::content() as $products) {

                Order::create([
                    'user_id'    => auth()->user()->id,
                    'product_id' => $products->id,
                    'quantity'   => $products->qty,
                ]);
                
            }//endo of foreach

        }//end fo  if

    }//end of function create order

}//end of controller
