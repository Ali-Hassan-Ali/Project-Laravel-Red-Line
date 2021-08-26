<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\Order;
use App\Models\Purchase;

class OrderController extends Controller
{
    public function index()
    {
        return view('home.payment');

    }//end pf index

    public function create_order(Request $request, Product $product)
    {   

        $request->validate([
            'name'    => 'required',
            'phone'   => 'required',
            'map'     => 'required',
        ]);

        try {

            $request_data = $request->except(['total_price','image']);
            $request_data['total_price'] = \Cart::subtotal();
            $request_data['user_id']     = auth()->user()->id;

            if ($request->image) {
                
                foreach ($request->image as $key=>$image) {
                    
                    Image::make($image)
                        ->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save('uploads/order_images/' . $image->hashName());

                    $request_data['image'][$key] = $image->hashName();
                
                }//end of foreach

            } //end of if

            $request_data['image'] = json_encode($request_data['image']);

            $orders = Order::create($request_data);

            if (Cart::count() < 0) {

                return redirect()->back()->with('no data');
                
            } else {
                
                foreach (Cart::content() as $products) {

                    Purchase::create([
                        'product_id' => $products->id,
                        'quantity'   => $products->qty,
                        'price'      => number_format($products->model->exchange_rate,2),
                        'order_id'   => $orders->id,
                    ]);
                    
                }//endo of foreach

                Cart::destroy();

            }//end fo  if


            return redirect()->route('purchase.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of function create order

}//end of controller