<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categorey;
use App\Models\Gallery;
use App\Models\Product;

class WelcomController extends Controller
{

    public function index()
    {
        $categories = Categorey::with('proudut')->limit(3)->get();
        $gallerys = Gallery::all();

        return view('home.welcome',compact('categories','gallerys'));
        
    }//end of  index

    public function show(Product $product)
    {
        $reand_product = Product::inRandomOrder()->get();

        return view('home.show',compact('product','reand_product'));
        
    }//end of  index

    public function category_show($id)
    {
        $products = Product::where('category_id',$id)->get();

        $category_name = Product::where('id', $id)->first();

        return view('home.category_show',compact('products','category_name'));

    }//end of function

    public function shop()
    {
        $products = Product::all();

        return view('home.shop',compact('products'));

    }//end of function

}//end of controller
