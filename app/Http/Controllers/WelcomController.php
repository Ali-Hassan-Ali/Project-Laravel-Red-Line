<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categorey;
use App\Models\Product;

class WelcomController extends Controller
{

    public function index()
    {
        $categories = Categorey::with('proudut')->limit(3)->get();

        return view('home.welcome',compact('categories'));
        
    }//end of  index

    public function show($id)
    {
        $products      = Product::where('id',$id)->first();
        $reand_product = Product::inRandomOrder()->get();

        return view('home.show',compact('products','reand_product'));
        
    }//end of  index

}//end of controller
