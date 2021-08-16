<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:orders_read'])->only('index','show');
        $this->middleware(['permission:orders_create'])->only('create','store');
        $this->middleware(['permission:orders_update'])->only('edit','update');
        $this->middleware(['permission:orders_delete'])->only('destroy');

    } //end of constructor
 
    public function index()
    {
        $orders = Order::whenSearch(request()->search)->latest()->paginate(12);

        return view('dashboard.orders.index',compact('orders'));

    }//end of index

 
    public function status(Request $request, $id)
    {
        $orders = Order::FindOrFail($id);

        $orders->update([
            'status' => $request->status,
        ]);

        return redirect()->back();

    }//end of create

 
    public function store(Request $request)
    {
        //
    }//end of store

 
    public function show(Order $order)
    {
        $orders = Purchase::where('order_id',$order->id)->get();

        return view('dashboard.orders.show',compact('orders'));
    }//end of show


    public function edit(Order $order)
    {
        //
    }//end of edit


    public function update(Request $request, Order $order)
    {
        //
    }//end of update

    
    public function destroy(Order $order)
    {
        
    }//end of destroy


}//end of xontroller
