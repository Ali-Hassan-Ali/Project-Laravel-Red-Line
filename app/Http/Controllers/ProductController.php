<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Order;

class ProductController extends Controller
{
    public function index()
    {
        return view('home.wallet');
    }//end of index

    public function show(Product $product)
    {
        $reand_product = Product::inRandomOrder()->get();

        return view('home.show',compact('product','reand_product'));
        
    }//end of  index

    public function add_card(Request $request,$product)
    {
        $product = Product::FindOrFail($product);

        $product = Cart::add($product->id, $product->name, 1 , $product->price)
            ->associate('App\Models\Product');

        return response()->json($product);

    }//end of function

    public function update(Request $request, $id)
    {   

        $product = Product::where('id', $request->id)->first();

        if (Product::where('quantity',$request->quantity)->exists()) {

            return response()->json(['success' => true]);
            
        } else {

            $cart = Cart::update($id, $request->quantity);

            return response()->json($cart);
        }//end fo if

    }//end of function

    public function destroy($id)
    {
        $cart = Cart::content()->where('rowId', $id)->first();
        Cart::remove($id);
        return response()->json($cart);
    
    }//end of function

}//end of controller
