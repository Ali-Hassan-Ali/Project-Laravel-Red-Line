<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\Product;
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

 
    public function index(Request $request)
    {
        $orders = Order::whenSearch(request()->search , $request)->latest()->paginate(12);

        return view('dashboard.orders.index',compact('orders'));

    }//end of index

 
    public function status(Request $request, $id)
    {
        try {

            $orders = Order::FindOrFail($id);

            $orders->update([
                'status' => $request->status,
            ]);

            $purchases = Purchase::where('order_id',$orders->id)->get();

            foreach ($purchases as $purchase) {

                $products = Product::where('id',$purchase->product_id)->get();

                foreach ($products as $product) {

                    if ($request->status == 1) {
                        
                        $product->update([
                            'quantity' => $product->quantity - $purchase->quantity
                        ]);

                    } else {

                        $product->update([
                            'quantity' => $product->quantity + $purchase->quantity
                        ]);
                    }

                }//end of foreach

            }//en dof foreach

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.orders.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of create

 
    public function show(Order $order)
    {
        $orders = Purchase::where('order_id',$order->id)->get();

        return view('dashboard.orders.show',compact('orders'));
    }//end of show

    
    public function destroy(Order $order)
    {
        try {

            // if ($order->status == 0) {
        
            //     $purchases = Purchase::where('order_id',$order->id)->get();

            //     foreach ($purchases as $purchase) {

            //         $products = Product::where('id',$purchase->product_id)->get();

            //         foreach ($products as $product) {

            //             $product->update([
            //                 'quantity' => $product->quantity - $purchase->quantity
            //             ]);

            //         }//end of foreach

            //     }//en dof foreach

            // }//end of if   

            foreach (json_decode($order->image) as $image) {

                Storage::disk('public_uploads')->delete('/order_images/' . $image);
                
            }//end of  deleted image

            $order->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));

            return redirect()->route('dashboard.orders.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy


}//end of xontroller
