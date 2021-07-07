<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categorey;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Categorey::with('proudut')->get();

        return view('home.welcome',compact('categories'));
        
    }//end of  index

}//end of controller
