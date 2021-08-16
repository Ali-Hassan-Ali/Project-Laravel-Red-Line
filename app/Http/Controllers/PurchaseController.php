<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function my_purchase()
    {
        $orders = Order::where('user_id',Auth()->user()->id)->get();

        return view('home.purchase',compact('orders'));

    }//end of my_purchase

    public function purchase_show($order_id)
    {
        $purchases = Purchase::where('order_id',$order_id)->get();

        return view('home.purchase_show',compact('purchases'));

    }//end of purchase_show

    public function purchase_edit($id)
    {
        $orders = Purchase::where('order_id',$id)->get();

        return view('home.purchase.edit',compact('orders'));

    }//end of purchase_show

}//end of controllrt
