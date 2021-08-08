<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        return view('home.payment');

    }//end pf index

    public function create_order(Request $request, Product $product)
    {

        $request->validate([
            'products' => 'required|array',
        ]);
        
        if (Cart::count() == 0) {

            return redirect()->back()->with('');
            
        } else {

            foreach (Cart::content() as $key => $products) {


                
            }//endo of foreach

        }//end fo  if

    }//end of function create order

}//end of controller
