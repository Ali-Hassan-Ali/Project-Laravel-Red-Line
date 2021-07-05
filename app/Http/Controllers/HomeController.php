<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.welcome');
    }//end of  index

}//end of controller
